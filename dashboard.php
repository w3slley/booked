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
			<title>Booked | Dashboard</title>
			<link rel="stylesheet" type="text/css" href="css/dashboard.css">
			<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
			<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display|Poiret+One" rel="stylesheet">
			<script src="javascript/main.js"></script>
			
		</head>
		<body>
			<nav>

				<form id="nav-add" method="POST" action="includes/add_book.inc.php">
					<input type="text" name="book" placeholder="Book title">
					<input type="text" name="author" placeholder="Author">
					<input type="text" name="category" placeholder="Category">
					<?php 
						$month = new BookEvent();
						echo $month->display_months();
					 ?>
					<input type="text" name="year" placeholder="Year finished">
					<button class= "add-img" type="submit" name="submit" onclick="alert('Wait while we are setting everything up...')"><img src="images/plus2.png"></button>
				</form>

				<form method="POST" action="includes/logout.inc.php">
					<button class="logout-button" type="submit" name="submit">Logout</button>
				</form>
				<a class="profile" href="profile.php">Profile</a>
			</nav>

			</form>

			<div class="navbar"> <!-- For now, you can only add books read from 2014 on(it takes from the database). Have to find a way so that the user can add the year he/she wants -->
				<a href="#"><img class="home-icon" src="images/home.png"></a>
				
				
			</div>

			<div class="body-div">
				<?php
					$data = new BookEvent();
				 	$data->display_years_homepage($id); //I need to fix this so that the user will see only the years which he/she added books.
				?>

				
				<form class="search" action="initial_page.php">
					<input type="search" name="search" placeholder="Books, authors, categories...">
					<button type="submit">Search</button>
				</form>


				<div class="last-book-added">
					<?php
					$get_data = new BookEvent();
					$data = $get_data->last_reading_event($id);

					$total = $get_data->total_books($id);
					?>
					<h1>The last book you read:</h1>
					<img src="bookcovers/bookcover<?php echo $data['book_id'] ?>.jpg" alt="">
					<div class="info">
						<p class="title">Title: <span><?php echo $data['book_title'] ?></span> </p>
						<p class="author">Author: <span><?php echo $data['author_name'] ?></span> </p>
						<p class="categorie">Category: <span><?php echo $data['catg_name'] ?></span> </p>
						<p class="month">Month finished: <span><?php echo $data['month_name'] ?> </span></p>
						<p class="year">Year finished: <span><?php echo $data['year_number'] ?></span> </p>
					</div>
				</div>

				<div class='total'>
					<p>You already read <?php echo $total; ?> books! That's awesome! </p>
				</div>
				<?php
					//This is how I will create a feature that tells users how many books they read in the current month!
					$month = Date('F'); //This is how you get the full month name (current)
					$year = Date('Y'); //This is how you get the full year number (current)
					$data = new BookEvent();
					$number = $data->books_read_current_month($id, $month, $year);

					
				?>
				<div class="total-month">
					<p>You read <?php echo $number; ?> books this month!</p>
				</div>
			</div>


		</body>
<?php } ?>