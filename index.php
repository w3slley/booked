<?php  
	include_once "includes/dbh.inc.php";
	session_start();

	
	if(isset($_SESSION['first_name'])){
		header("Location: initial_page.php?home");
	}
	else { ?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>
		Book app
		</title>
		
	</head>
	<body>

	<?php 
		if(!isset($_SESSION['first_name'])) {?>
		
			<h1>Login</h1>
			<form method="POST" action="includes/login.inc.php">
				<input type="name" name="email" placeholder="E-mail adress or username">
				<input type="password" name="password" placeholder="Your password">
				<button type="submit" name="submit">Login</button>
			</form>

			<?php
			if(isset($_GET['login'])) {
				$login = $_GET['login'];
		
				if($login=="failed") {
				echo "Please verify your e-mail address and password.";
				}
				if($login == "empty"){
				echo "Please insert your e-mail address and password.";
				}
			
			}?>

			<br><br>
			<h1>Sign up</h1>
			<form method="POST" action="includes/signup.inc.php">
				<input type="name" name="first" placeholder="First name"><br>
				<input type="name" name="last" placeholder="Last name"><br>
				<input type="name" name="user_name" placeholder="Username"><br>
				<input type="email" name="email" placeholder="E-mail"><br>
				<input type="password" name="password" placeholder="Password"><br>
				<input type="password" name="password2" placeholder="Repeat password"><br>
				<button type="submit" name="submit">Sign up</button>
			</form>
			<br>

			<?php
			if(isset($_GET['password'])) {
				$password = $_GET['password'];
		
				if($password=="notEqual") {
				echo "The passwords are not equal. Please, try again.";
				}
			}

			if(isset($_GET['signup'])){
				$signup = $_GET['signup'];
				if($signup == "empty") {
					echo "You didn't fill in all the fields. Please, try again.";
				}
				if($signup == "success") {
					echo "You are now sign up. Please, login.";
				}
			}

			?>


		<?php

			if(isset($_GET['logout'])) {
					$logout = $_GET['logout'];

				if ($logout = "success") {
					echo "Bye, until next time!";
				}
			}
		}	
		?>
		

	</body>
	</html>
	<?php }
?>

