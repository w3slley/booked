<?php  

	session_start();
	if(isset($_SESSION['id'])){
		header("Location: dashboard.php");
	}
	else { 
	/*setcookie('userId', hash('sha256', 'text'));*/


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
					<button type="submit" name="submit">Sign up</button>
				</form>
			</div>
		</div>	

		<div class="body">
			<div class="container1">
				<div class="row1">
					<h1>This is a text.</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat.</p>
				</div>
				<div class="row2">
					<img src="images/open-book.svg">
				</div>
			</div>
			<div class="container2">
				<div class="row1">
					<img src="images/shelf_of_books.png">
				</div>
				<div class="row2">
					<h1>This is another text.</h1>
					<p>Uis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat nonproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
			</div>

			<div class="container3">
				<img src="images/education.svg">
				<p>So, what are you waiting for? Sign up <a href="#">here</a>!</p>
			</div>
			
		</div>
		
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
		

		<footer>
			<ul>
				<li><a href="#">About</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
			<p class="trademark">Created by Weslley. 2018-2019. All rights reserved. </p>
    	</footer>
		<script src="javascript/index.js"></script>
	</body>
	</html>

