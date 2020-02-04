<?php
	session_start();
	if(isset($_SESSION['id'])){
		header("Location: dashboard.php");
	}
	else {
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Booked: keep track of the books you read!</title>
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="stylesheet" href="css/index.css">
		<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Ubuntu|Poiret+One|Dosis|Acme|Rajdhani|Satisfy" rel="stylesheet">

	</head>
	<body>

		<div class="header">
			<nav>
				<div class="logo">
					<img src="images/books.svg" >
					<p>Booked</p>
				</div>

				<ul>
					<li><a href="#">About</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Contact</a></li>
					<li><a class="login" href="login.php">Log in</a></li>
				</ul>
			</nav>
			<div class="welcome">

			<span class="text"></span>
			</div>
			<div class="sign-up">
				<form method="POST" action="includes/signup.inc.php">
					<input type="text" name="name" placeholder="Name"><br>
					<input type="text" name="user-name" placeholder="Username"><br>
					<input type="email" name="email" placeholder="E-mail"><br>
					<input type="password" name="password" placeholder="Password"><br>
					<input type="password" name="password2" placeholder="Repeat password"><br>
					<br>
					<?php
						if(isset($_GET['password'])) {
							$password = $_GET['password'];

							if($password=="notEqual") {
							echo "<small style='color:red;font-weight:bold'>The passwords are not equal. Please, try again.</small>";
							}
						}

						if(isset($_GET['signup'])){
							$signup = $_GET['signup'];
							if($signup == "empty") {
								echo "<small style='color:red;font-weight:bold'>You didn't fill in all the fields. Please, try again.</small>";
							}
							if($signup == "invalidEmail"){
								echo "<small style='color:red;font-weight:bold'>E-mail is not valid. Please, try again.</small>";
							}
						}
						?>
					<button type="submit" name="submit">Sign up</button>

				</form>
			</div>
		</div>

		<footer>
			<ul>
				<li><a href="#">About</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
			<p class="trademark">Created by <a href="https://wvict.github.io">Weslley</a>. 2018-2019. All rights reserved. </p>
    	</footer>
		<script src="javascript/index.js"></script>
	</body>
	</html>

<?php }