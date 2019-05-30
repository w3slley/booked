<?php  
	session_start();
	include "includes/dbh.inc.php";
	include "classes/BookEvent.php";
	if(isset($_SESSION['id'])){
	$id = $_SESSION['id'];
?>
<!DOCTYPE html>
		<html>
		<head>
			<title>BookList | Welcome</title>
			<link rel="stylesheet" type="text/css" href="css/dashboard.css">
			<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display|Poiret+One" rel="stylesheet">
			<script src="javascript/main.js"></script>
		</head>
		<body>
			<nav>

				<form id="nav-add" method="POST" action="includes/add_book.inc.php">
					<input type="text" name="book" placeholder="Book title">
					<input type="text" name="author" placeholder="Author">
					<input type="text" name="category" placeholder="Category">
					<input type="text" name="month" placeholder="Month finished">
					<input type="text" name="year" placeholder="Year finished">
					<button class= "add-img" type="submit" name="submit" onclick="alert('Wait while we are setting everything up...')"><img src="plus2.png"></button>
				</form>

				<form method="POST" action="includes/logout.inc.php">
					<button class="logout-button" type="submit" name="submit">Logout</button>
				</form>
				<a class="profile" href="profile.php">Profile</a>
			</nav>

			</form>

			<div class="navbar"> <!-- For now, you can only add books read from 2014 on(it takes from the database). Have to find a way so that the user can add the year he/she wants -->
				<a href="#"><img class="home-icon" src="home.png"></a>
				
				
			</div>

			<div class="body-div">
				<?php
					$data = new BookEvent();
				 	$data->display_years_homepage($id); //I need to fix this so that the user will see only the years which he/she added books.
				?>
				<form class="search" action="initial_page.php">
					<input type="search" name="search" placeholder="Books, authors, categories...">
					<button type="submit" name="submit">Search</button>
				</form>
			</div>
		</body>
<?php } ?>