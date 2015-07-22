<?php
$autoloader = new Autoloader();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Data Design Project</title>
	</head>
	<body>

		<div class="container">

			<div class="header">
				<h1>
					Reddit - Data Design
				</h1>
				<img class="redditLogo" src="images/reddit-alien.svg" alt="reddit"/>
			</div>

			<!-- Persona -->
			<div class="persona darkBG">
				<h2 class="title">
					Persona
				</h2>

				<div class="personaTop">
					<div class="picture inlineBlock">
						<img class="idPic" src="images/profilePic.jpg"/>
					</div>
					<div class="personalInfo inlineBlock">
						<h2 class="textLeft">
							Dave Keyes
						</h2>

						<p class="quote textLeft">
							"I want to talk about all the cool stuff going on in the world!"
						</p>

						<p class="bio textLeft">
							Dave is a programmer at heart, and also at his job. He works for a web development company,
							and
							frequents sites like reddit for tech news, tips, and tricks.
						</p>
					</div>
					<div class="needs inlineBlock">
						<h2>
							Needs:
						</h2>

						<p class="small">
							(In order of preference)
						</p>
						<ul class="listItem noBullets">
							<li>
								To share content.
							</li>
							<li>
								To talk about said content.
							</li>
							<li>
								To vote on content.
							</li>
						</ul>
					</div>
				</div>
				<div class="personaBot">
					<div class="idealFeatures inlineBlock">
						<h2 class="textLeft">
							Ideal Features:
						</h2>
						<ul class="textLeft listItem noBullets">
							<li>
								Ability to share content.
							</li>
							<li>
								Ability to converse with other users about said content.
							</li>
							<li>
								Ability to save content for later viewing.
							</li>
							<li>
								Ability to vote on content to shape the site to his preferences.
							</li>
						</ul>
					</div>
					<div class="frustrations inlineBlock">
						<h2 class="textLeft">
							Frustrations:
						</h2>
						<ul class="textLeft listItem noBullets">
							<li>
								Other sites are hard to submit to.
							</li>
							<li>
								Other sites have less discussion/toxic discussion.
							</li>
							<li>
								Other sites don't have a voting system.
							</li>
						</ul>
					</div>
					<div class="keyAttributes inlineBlock">
						<h2 class="textLeft">
							Key Attributes:
						</h2>
						<ul class="textLeft listItem noBullets">
							<li>
								Very tech oriented.
							</li>
							<li>
								Confident when using the internet.
							</li>
							<li>
								Likes to share.
							</li>
						</ul>
					</div>
				</div>
			</div>

			<!-- Use Cases -->
			<div class="useCases darkBG">
				<h2 class="title">
					Use Cases
				</h2>
				<ul class="noBullets">
					<li>
						<h3>Creating an account:</h3>

						<ol class="textLeft useCaseList">
							<li>
								A user would access the site
							<li>
								Click <em>sign in or create account</em>
							</li>
							<li>
								Enter their info in the <em>create a new account</em> section
							</li>
							<li>
								Click <em>create account</em>
							</li>
						</ol>
					</li>
					<li>
						<h3>Logging in:</h3>

						<ol class="textLeft useCaseList">
							<li>
								A user would access the site
							</li>
							<li>
								Click <em>sign in or create account</em>
							</li>
							<li>
								Enter their info in the <em>sign in</em> section
							</li>
							<li>
								Click <em>sign in</em>
							</li>
						</ol>
					</li>
					<li>
						<h3>Posting a submission:</h3>

						<h4 class="indent">Posting a text post:</h4>
						<ol class="textLeft useCaseList">
							<!-- Text Post -->
							<li>
								A user would access the site
							</li>
							<li>
								Log in
							</li>
							<li>
								Click <em>Submit a new text post</em>
							</li>
							<li>
								Write their submission in the text box
							</li>
							<li>
								Click <em>submit</em>
							</li>
						</ol>

						<h4 class="indent">Posting a link</h4>
						<ol class="textLeft useCaseList">
							<!-- Link -->
							<li>
								A user would access the site
							</li>
							<li>
								Log in
							</li>
							<li>
								Click <em>Submit a new link</em>
							</li>
							<li>
								Paste the link in the link box
							</li>
							<li>
								Click <em>submit</em>
							</li>
						</ol>
					</li>
					<li>
						<h3>Posting a comment:</h3>

						<ol class="textLeft useCaseList">
							<li>
								A user would access the site
							</li>
							<li>
								Log in
							</li>
							<li>
								Access a submission
							</li>
							<li>
								Write their reply
							</li>
							<li>
								Click <em>save</em>
							</li>
						</ol>
					</li>
					<li>
						<h3>Voting on a post:</h3>

						<ol class="textLeft useCaseList">
							<li>
								A user would access the site
							</li>
							<li>
								Log in
							</li>
							<li>
								Click the <em>up</em> or <em>down</em> arrow next to a submission
							</li>
						</ol>
					</li>
				</ul>
			</div>

			<!-- -->
			<div class="erd darkBG">

				<h2 class="title">
					ERD
				</h2>

				<img src="images/reddit_erd.svg" alt="Reddit ERD"/>

			</div>

			<!-- MySQL -->
			<div class="sql darkBG">

				<h2 class="title">
					MySQL
				</h2>

				<!-- HTML generated using hilite.me -->
				<div
					style="background: #272822; overflow:auto;width:auto;border:solid gray;border-width:.1em .1em .1em .8em;padding:.2em .6em;">
					<table>
						<tr>
							<td><pre style="margin: 0; line-height: 125%"> 1
 2
 3
 4
 5
 6
 7
 8
 9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68
69</pre>
							</td>
							<td><pre style="margin: 0; line-height: 125%"><span style="color: #66d9ef">DROP</span> <span
										style="color: #66d9ef">TABLE</span> <span style="color: #66d9ef">IF</span> <span
										style="color: #66d9ef">EXISTS</span> <span
										style="color: #f8f8f2">savedComment;</span>
<span style="color: #66d9ef">DROP</span> <span style="color: #66d9ef">TABLE</span> <span
										style="color: #66d9ef">IF</span> <span
										style="color: #66d9ef">EXISTS</span> <span
										style="color: #f8f8f2">savedSubmission;</span>
<span style="color: #66d9ef">DROP</span> <span style="color: #66d9ef">TABLE</span> <span
										style="color: #66d9ef">IF</span> <span
										style="color: #66d9ef">EXISTS</span> <span
										style="color: #f8f8f2">votedComment;</span>
<span style="color: #66d9ef">DROP</span> <span style="color: #66d9ef">TABLE</span> <span
										style="color: #66d9ef">IF</span> <span
										style="color: #66d9ef">EXISTS</span> <span
										style="color: #f8f8f2">votedSubmission;</span>
<span style="color: #66d9ef">DROP</span> <span style="color: #66d9ef">TABLE</span> <span
										style="color: #66d9ef">IF</span> <span
										style="color: #66d9ef">EXISTS</span> <span
										style="color: #f8f8f2">comment;</span>
<span style="color: #66d9ef">DROP</span> <span style="color: #66d9ef">TABLE</span> <span
										style="color: #66d9ef">IF</span> <span
										style="color: #66d9ef">EXISTS</span> <span
										style="color: #f8f8f2">submission;</span>
<span style="color: #66d9ef">DROP</span> <span style="color: #66d9ef">TABLE</span> <span
										style="color: #66d9ef">IF</span> <span
										style="color: #66d9ef">EXISTS</span> <span
										style="color: #f8f8f2">profile;</span>

<span style="color: #66d9ef">CREATE</span> <span style="color: #66d9ef">TABLE</span> <span style="color: #a6e22e">profile</span> <span
										style="color: #f8f8f2">(</span>
	<span style="color: #f8f8f2">profileId</span> <span style="color: #66d9ef">INT</span> <span style="color: #66d9ef">UNSIGNED</span> <span
										style="color: #66d9ef">AUTO_INCREMENT</span> <span
										style="color: #66d9ef">NOT</span> <span
										style="color: #66d9ef">NULL</span><span style="color: #f8f8f2">,</span>
	<span style="color: #f8f8f2">username</span>  <span style="color: #66d9ef">VARCHAR</span><span
										style="color: #f8f8f2">(</span><span style="color: #ae81ff">64</span><span
										style="color: #f8f8f2">)</span>                 <span
										style="color: #66d9ef">NOT</span> <span style="color: #66d9ef">NULL</span><span
										style="color: #f8f8f2">,</span>
	<span style="color: #66d9ef">UNIQUE</span> <span style="color: #f8f8f2">(username),</span>
	<span style="color: #66d9ef">PRIMARY</span> <span style="color: #66d9ef">KEY</span> <span style="color: #f8f8f2">(profileId)</span>
<span style="color: #f8f8f2">);</span>

<span style="color: #66d9ef">CREATE</span> <span style="color: #66d9ef">TABLE</span> <span style="color: #a6e22e">submission</span> <span
										style="color: #f8f8f2">(</span>
	<span style="color: #f8f8f2">submissionId</span> <span style="color: #66d9ef">INT</span> <span
										style="color: #66d9ef">UNSIGNED</span> <span style="color: #66d9ef">AUTO_INCREMENT</span> <span
										style="color: #66d9ef">NOT</span> <span style="color: #66d9ef">NULL</span><span
										style="color: #f8f8f2">,</span>
	<span style="color: #f8f8f2">profileId</span> <span style="color: #66d9ef">INT</span> <span style="color: #66d9ef">UNSIGNED</span> <span
										style="color: #66d9ef">NOT</span> <span style="color: #66d9ef">NULL</span><span
										style="color: #f8f8f2">,</span>
	<span style="color: #f8f8f2">score</span> <span style="color: #66d9ef">INT</span> <span
										style="color: #f8f8f2">SIGNED</span> <span
										style="color: #66d9ef">NOT</span> <span
										style="color: #66d9ef">NULL</span><span style="color: #f8f8f2">,</span>
	<span style="color: #f8f8f2">submissionContent</span> <span style="color: #66d9ef">VARCHAR</span><span
										style="color: #f8f8f2">(</span><span style="color: #ae81ff">65535</span><span
										style="color: #f8f8f2">)</span> <span style="color: #66d9ef">NOT</span> <span
										style="color: #66d9ef">NULL</span><span style="color: #f8f8f2">,</span>
	<span style="color: #f8f8f2">submissionDate</span> <span style="color: #66d9ef">DATETIME</span> <span
										style="color: #66d9ef">NOT</span> <span style="color: #66d9ef">NULL</span><span
										style="color: #f8f8f2">,</span>
	<span style="color: #66d9ef">INDEX</span><span style="color: #f8f8f2">(submissionId),</span>
	<span style="color: #66d9ef">FOREIGN</span> <span style="color: #66d9ef">KEY</span><span style="color: #f8f8f2">(profileId)</span> <span
										style="color: #66d9ef">REFERENCES</span> <span
										style="color: #a6e22e">profile</span><span
										style="color: #f8f8f2">(profileId),</span>
	<span style="color: #66d9ef">PRIMARY</span> <span style="color: #66d9ef">KEY</span><span style="color: #f8f8f2">(submissionId)</span>
<span style="color: #f8f8f2">);</span>

<span style="color: #66d9ef">CREATE</span> <span style="color: #66d9ef">TABLE</span> <span style="color: #a6e22e">comment</span> <span
										style="color: #f8f8f2">(</span>
	<span style="color: #f8f8f2">commentId</span> <span style="color: #66d9ef">INT</span> <span style="color: #66d9ef">UNSIGNED</span> <span
										style="color: #66d9ef">AUTO_INCREMENT</span> <span
										style="color: #66d9ef">NOT</span> <span
										style="color: #66d9ef">NULL</span><span style="color: #f8f8f2">,</span>
	<span style="color: #f8f8f2">profileId</span> <span style="color: #66d9ef">INT</span> <span style="color: #66d9ef">UNSIGNED</span> <span
										style="color: #66d9ef">NOT</span> <span style="color: #66d9ef">NULL</span><span
										style="color: #f8f8f2">,</span>
	<span style="color: #f8f8f2">score</span> <span style="color: #66d9ef">INT</span> <span
										style="color: #f8f8f2">SIGNED</span> <span
										style="color: #66d9ef">NOT</span> <span
										style="color: #66d9ef">NULL</span><span style="color: #f8f8f2">,</span>
	<span style="color: #f8f8f2">commentContent</span> <span style="color: #66d9ef">VARCHAR</span><span
										style="color: #f8f8f2">(</span><span style="color: #ae81ff">65535</span><span
										style="color: #f8f8f2">)</span> <span style="color: #66d9ef">NOT</span> <span
										style="color: #66d9ef">NULL</span><span style="color: #f8f8f2">,</span>
	<span style="color: #f8f8f2">commentDate</span> <span style="color: #66d9ef">DATETIME</span> <span
										style="color: #66d9ef">NOT</span> <span style="color: #66d9ef">NULL</span><span
										style="color: #f8f8f2">,</span>
	<span style="color: #66d9ef">INDEX</span><span style="color: #f8f8f2">(commentId),</span>
	<span style="color: #66d9ef">FOREIGN</span> <span style="color: #66d9ef">KEY</span><span style="color: #f8f8f2">(profileId)</span> <span
										style="color: #66d9ef">REFERENCES</span> <span
										style="color: #a6e22e">profile</span><span
										style="color: #f8f8f2">(profileId),</span>
	<span style="color: #66d9ef">PRIMARY</span> <span style="color: #66d9ef">KEY</span><span style="color: #f8f8f2">(commentId)</span>
<span style="color: #f8f8f2">);</span>

<span style="color: #66d9ef">CREATE</span> <span style="color: #66d9ef">TABLE</span> <span style="color: #a6e22e">votedSubmission</span> <span
										style="color: #f8f8f2">(</span>
	<span style="color: #f8f8f2">profileId</span> <span style="color: #66d9ef">INT</span> <span style="color: #66d9ef">UNSIGNED</span> <span
										style="color: #66d9ef">NOT</span> <span style="color: #66d9ef">NULL</span><span
										style="color: #f8f8f2">,</span>
	<span style="color: #f8f8f2">submissionId</span> <span style="color: #66d9ef">INT</span> <span
										style="color: #66d9ef">UNSIGNED</span> <span
										style="color: #66d9ef">NOT</span> <span
										style="color: #66d9ef">NULL</span><span style="color: #f8f8f2">,</span>
	<span style="color: #f8f8f2">voteType</span> <span style="color: #f8f8f2">BOOLEAN,</span>
	<span style="color: #66d9ef">FOREIGN</span> <span style="color: #66d9ef">KEY</span><span style="color: #f8f8f2">(profileId)</span> <span
										style="color: #66d9ef">REFERENCES</span> <span
										style="color: #a6e22e">profile</span><span
										style="color: #f8f8f2">(profileId),</span>
	<span style="color: #66d9ef">FOREIGN</span> <span style="color: #66d9ef">KEY</span><span style="color: #f8f8f2">(submissionId)</span> <span
										style="color: #66d9ef">REFERENCES</span> <span
										style="color: #a6e22e">submission</span><span style="color: #f8f8f2">(submissionId)</span>
<span style="color: #f8f8f2">);</span>

<span style="color: #66d9ef">CREATE</span> <span style="color: #66d9ef">TABLE</span> <span style="color: #a6e22e">votedComment</span> <span
										style="color: #f8f8f2">(</span>
	<span style="color: #f8f8f2">profileId</span> <span style="color: #66d9ef">INT</span> <span style="color: #66d9ef">UNSIGNED</span> <span
										style="color: #66d9ef">NOT</span> <span style="color: #66d9ef">NULL</span><span
										style="color: #f8f8f2">,</span>
	<span style="color: #f8f8f2">commentId</span> <span style="color: #66d9ef">INT</span> <span style="color: #66d9ef">UNSIGNED</span> <span
										style="color: #66d9ef">NOT</span> <span style="color: #66d9ef">NULL</span><span
										style="color: #f8f8f2">,</span>
	<span style="color: #f8f8f2">voteType</span> <span style="color: #f8f8f2">BOOLEAN,</span>
	<span style="color: #66d9ef">FOREIGN</span> <span style="color: #66d9ef">KEY</span><span style="color: #f8f8f2">(profileId)</span> <span
										style="color: #66d9ef">REFERENCES</span> <span
										style="color: #a6e22e">profile</span><span
										style="color: #f8f8f2">(profileId),</span>
	<span style="color: #66d9ef">FOREIGN</span> <span style="color: #66d9ef">KEY</span><span style="color: #f8f8f2">(commentId)</span> <span
										style="color: #66d9ef">REFERENCES</span> <span
										style="color: #a6e22e">submission</span><span
										style="color: #f8f8f2">(commentId)</span>
<span style="color: #f8f8f2">);</span>


<span style="color: #66d9ef">CREATE</span> <span style="color: #66d9ef">TABLE</span> <span style="color: #a6e22e">savedSubmission</span> <span
										style="color: #f8f8f2">(</span>
	<span style="color: #f8f8f2">profileId</span> <span style="color: #66d9ef">INT</span> <span style="color: #66d9ef">UNSIGNED</span> <span
										style="color: #66d9ef">NOT</span> <span style="color: #66d9ef">NULL</span><span
										style="color: #f8f8f2">,</span>
	<span style="color: #f8f8f2">submissionId</span> <span style="color: #66d9ef">INT</span> <span
										style="color: #66d9ef">UNSIGNED</span> <span
										style="color: #66d9ef">NOT</span> <span
										style="color: #66d9ef">NULL</span><span style="color: #f8f8f2">,</span>
	<span style="color: #f8f8f2">saveDate</span> <span style="color: #66d9ef">DATETIME</span> <span
										style="color: #66d9ef">NOT</span> <span style="color: #66d9ef">NULL</span><span
										style="color: #f8f8f2">,</span>
	<span style="color: #66d9ef">FOREIGN</span> <span style="color: #66d9ef">KEY</span><span style="color: #f8f8f2">(profileId)</span> <span
										style="color: #66d9ef">REFERENCES</span> <span
										style="color: #a6e22e">profile</span><span
										style="color: #f8f8f2">(profileId),</span>
	<span style="color: #66d9ef">FOREIGN</span> <span style="color: #66d9ef">KEY</span><span style="color: #f8f8f2">(submissionId)</span> <span
										style="color: #66d9ef">REFERENCES</span> <span
										style="color: #a6e22e">submission</span><span style="color: #f8f8f2">(submissionId)</span>
<span style="color: #f8f8f2">);</span>

<span style="color: #66d9ef">CREATE</span> <span style="color: #66d9ef">TABLE</span> <span style="color: #a6e22e">savedComment</span> <span
										style="color: #f8f8f2">(</span>
	<span style="color: #f8f8f2">profileId</span> <span style="color: #66d9ef">INT</span> <span style="color: #66d9ef">UNSIGNED</span> <span
										style="color: #66d9ef">NOT</span> <span style="color: #66d9ef">NULL</span><span
										style="color: #f8f8f2">,</span>
	<span style="color: #f8f8f2">commentId</span> <span style="color: #66d9ef">INT</span> <span style="color: #66d9ef">UNSIGNED</span> <span
										style="color: #66d9ef">NOT</span> <span style="color: #66d9ef">NULL</span><span
										style="color: #f8f8f2">,</span>
	<span style="color: #f8f8f2">saveDate</span> <span style="color: #66d9ef">DATETIME</span> <span
										style="color: #66d9ef">NOT</span> <span style="color: #66d9ef">NULL</span><span
										style="color: #f8f8f2">,</span>
	<span style="color: #66d9ef">FOREIGN</span> <span style="color: #66d9ef">KEY</span><span style="color: #f8f8f2">(profileId)</span> <span
										style="color: #66d9ef">REFERENCES</span> <span
										style="color: #a6e22e">profile</span><span
										style="color: #f8f8f2">(profileId),</span>
	<span style="color: #66d9ef">FOREIGN</span> <span style="color: #66d9ef">KEY</span><span style="color: #f8f8f2">(commentId)</span> <span
										style="color: #66d9ef">REFERENCES</span> <span
										style="color: #a6e22e">submission</span><span
										style="color: #f8f8f2">(commentId)</span>
<span style="color: #f8f8f2">);</span>
</pre>
							</td>
						</tr>
					</table>
				</div>


			</div>

		</div>

	</body>
</html>