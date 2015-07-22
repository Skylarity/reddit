<?php
/**
 * AES 256 encryption
 *
 * @author Skyler Rexroad
 */

/**
 * encrypts text using AES 256 CBC mode using mcypt_encrypt()
 *
 * @param string $plaintext plaintext to encrypt
 * @param string $password plaintext symmetric key
 * @return string base 64 encoded ciphertext
 * @see http://php.net/manual/en/function.mcrypt-encrypt.php
 **/
function aes256Encrypt($plaintext, $password) {
	// hash the key
	$key = pack("H*", substr(hash("sha512", $password), 0, 64));

	// generate an initialization vector (IV)
	$ivSize = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
	$iv = mcrypt_create_iv($ivSize, MCRYPT_RAND);

	// pad the plaintext
	$blocksize = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
	$plaintext = pkcs5Pad($plaintext, $blocksize);

	// encrypt the plaintext
	$ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $plaintext, MCRYPT_MODE_CBC, $iv);
	$ciphertext = $iv . $ciphertext;
	return (base64_encode($ciphertext));
}

/**
 * decrypts text using AES 256 CBC mode using mcrypt_decrypt()
 *
 * @param string $ciphertext base 64 encoded ciphertext
 * @param string $password plaintext symmetric key
 * @return string decrypted plaintext
 * @throws InvalidArgumentException if the plaintext can't be unpadded
 * @see http://php.net/manual/en/function.mcrypt-decrypt.php
 **/
function aes256Decrypt($ciphertext, $password) {
	// hash the key
	$key = pack("H*", substr(hash("sha512", $password), 0, 64));

	// divide the initialization vector and encrypted data
	$ivSize = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
	$rawBlock = base64_decode($ciphertext);
	$rawIv = substr($rawBlock, 0, $ivSize);
	$rawCiphertext = substr($rawBlock, $ivSize);

	// unpad the plaintext before returning it
	try {
		$plaintext = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $rawCiphertext, MCRYPT_MODE_CBC, $rawIv);
		$plaintext = pkcs5Unpad($plaintext);
	} catch(InvalidArgumentException $invalidArgument) {
		throw(new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
	}
	return ($plaintext);
}

/**
 * pads text according to the PKCS#5 standard
 *
 * @param string $text text to pad
 * @param int $blocksize blocksize to conform to
 * @return string PKCS#5 padded text
 **/
function pkcs5Pad($text, $blocksize) {
	$pad = $blocksize - (strlen($text) % $blocksize);
	return ($text . str_repeat(chr($pad), $pad));
}


/**
 * unpads the text according to the PKCS#5 standard
 *
 * @param string $text text to unpad
 * @return string unpadded text
 * @throws InvalidArgumentException if the blocksize or padding is invalid
 **/
function pkcs5Unpad($text) {
	$pad = ord($text[strlen($text) - 1]);
	if($pad > strlen($text)) {
		throw(new InvalidArgumentException("padding exceeds length of text"));
	}
	if(strspn($text, chr($pad), strlen($text) - $pad) !== $pad) {
		throw(new InvalidArgumentException("text is not PKCS#5 padded"));
	}
	return (substr($text, 0, -1 * $pad));
}
