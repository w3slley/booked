<?php  
	session_start();
	
	include "classes/BookEvent.php";
	if(isset($_SESSION['id'])){
	$id = $_SESSION['id'];
?>
<!DOCTYPE html>
		<html>
		<head>
			<title>Booked | Dashboard</title>
			<link rel="stylesheet" type="text/css" href="css/dashboard.css">
			<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
			<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display|Poiret+One|Satisfy" rel="stylesheet">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			
		</head>
		<body>

		<div class="modal">
				<div class="modal-content">
					<span class="close">&times;</span>
					<form id="nav-add" method="POST" action="includes/add_book.inc.php">
						<input type="text" name="book" placeholder="Book title"><br>
						<input type="text" name="author" placeholder="Author"><br>
						<input type="text" name="category" placeholder="Category"><br>
						
						<?php 
							$month = new BookEvent();
							echo $month->display_months();
						?><br>
						<input type="text" name="year" placeholder="Year finished"><br>
						<input type="text" name="classification" placeholder="Your grade (0-100)"><br>
						<button type="submit" name="submit" onclick="alert('Wait while we are setting everything up...')">Add book</button>
					</form>
					<?php  
						if(isset($_GET['failed'])){
							$failed = $_GET['failed'];

							if($failed == 'empty') {
								echo "<p id='message-add'>You didn't fill in all the fields. Please, try again.</p>";
							}
						}
					?>
				</div>
			</div>
			<nav>
				<div class="logo">
					<img src="images/books.svg" >
					<p>Booked</p>
				</div>
				<p class="add-book"><img style="width: 30px" src="images/plus2.png">Add book</p>
				
				<form method="POST" action="includes/logout.inc.php">
					<button class="logout-button" type="submit" name="submit">Logout</button>
				</form>
				<a class="profile" href="profile.php">Profile</a>
			</nav>


			<div class="body-div">
				<?php
					$data = new BookEvent();
				 	$data->display_years_homepage($id); //I need to fix this so that the user will see only the years which he/she added books.
				?>

				
				<form class="search" action="initial_page.php">
					<input type="search" name="search" placeholder="Books, authors, categories...">
					<button type="submit">Search</button>
				</form>


				
					<?php
					$get_data = new BookEvent();
					$data = $get_data->last_reading_event($id);

					$total = $get_data->total_books($id);
					if($total != 0){
						
						?>
				<div class="last-book-added">
					<h1>The last book you read:</h1>
					<img src="bookcovers/bookcover<?php echo $data['id'] ?>.jpg" alt="">
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
					}
				else{ ?>
				<div class="new">
				<p>What are you waiting for? Add a new book!</p>

				</div>
				
	<?php
				}
				?>

				
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

			<footer>
				<ul>
					<li><a href="#">About</a></li>
					<li><a href="#">Blog</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
				<p class="trademark">Created by Weslley. 2018-2019. All rights reserved. </p>
    		</footer>

			<script src="javascript/dashboard.js"></script>
		</body>
<?php } ?>