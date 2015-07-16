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
				<h1>Reddit - Data Design</h1>
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
							Dave is a programmer at heart, and also at his job. He works for a web development company, and
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

						<ul class="textLeft listItem">
							<li>
								A user creates an account by accessing the site, clicking "sign in or create account", entering
								their info in the "create a new account" section, and clicking "create account".
							</li>
						</ul>
					</li>
					<li>
						<h3>Logging in:</h3>

						<ul class="textLeft listItem">
							<li>
								A user logs in by accessing the site, clicking "sign in or create account", entering their info
								in
								the "sign in" section, and clicking "sign in".
							</li>
						</ul>
					</li>
					<li>
						<h3>Posting a submission:</h3>

						<ul class="textLeft listItem">
							<li>
								A user submits a text post by accessing the site, logging in, clicking "Submit a new text post",
								writing their submission, and clicking "submit".
							</li>

							<li>
								A user submits a link by accessing the site, logging in, clicking "Submit a new link", pasting
								the
								link, and clicking "submit".
							</li>
						</ul>
					</li>
					<li>
						<h3>Posting a comment:</h3>

						<p class="listItemP">
							A user posts a comment by accessing the site, logging in, accessing a submission, writing their
							reply, and clicking "save".
						</p>
					</li>
					<li>
						<h3>Voting on a post:</h3>

						<ul class="textLeft listItem">
							<li>
								A user votes on a post by accessing the site, logging in, and pressing the up or down arrow next
								to
								a submission.
							</li>
						</ul>
					</li>
				</ul>
			</div>

		</div>

	</body>
</html>