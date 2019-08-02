<?php 
	session_start();
	include "classes/BookEvent.php";
	include "includes/dbh.inc.php";
	$id = $_SESSION['id'];

	if(!isset($id)){
		header("Location: index.php");
	}
	else {
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Booked | Keep track of books you read!</title>

			<link rel="stylesheet" type="text/css" href="css/initial_page.css">
			<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display|Poiret+One|Dosis|Satisfy" rel="stylesheet">
			<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		</head>
		<body>
		<div class="container">
			<div class="modal">
				<div class="modal-content">
					<span class="close">&times;</span>
					<form class="nav-add" method="POST" action="includes/add_book.inc.php">
						<input class="book-title" type="text" name="book" placeholder="Book title"><br>
						<input class="author-name" type="text" name="author" placeholder="Author"><br>
						<input class="category" type="text" name="category" placeholder="Category"><br>
						
						<?php 
							$month = new BookEvent();
							echo $month->display_months();
						?><br>
						<input class="year" type="text" name="year" placeholder="Year finished"><br>
						<input class="classification" type="text" name="classification" placeholder="Your grade (0-100)"><br>
						
						<button type="submit" name="submit">Add book</button>
						<p class="message"></p>
					</form>
					<div class="loading-modal">
						<div class="loader"></div>
					</div>
					
					
				</div>
			</div>
		
			<nav class="nav">
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
	

		<div class="navbar"> 
			<a href="dashboard.php"><img class="home-icon" src="images/home.png"></a>
			<div class="years">
			<?php
			$years_nav = new BookEvent();
			$years_nav->display_years_homepage($id); 
			?>
			</div>
			
		</div>

		<br>
			
		<?php 

		//This is how I managed to solve the problem with the links. I created a variable with the url path to the file to insert in the href and searched inside it to find the year the users is at. I also inserted this year into the href link.

		$url = $_SERVER['REQUEST_URI']; //This is how you get the current URL from the SERVER!! That's pretty usefull.
		$year_url_initial = strpos($url, '2'); 
		$yearInUrl = substr($url, $year_url_initial, 4); //This works like variable[0:5] in python... substr(string, start, lenght). This thing gets the year out of the url!
		
		
		//The links will take the year from the url! #I also added a new function (books_read_month and books_read_year) that output the number of books read in that particular month and year, respectively!

		$query = $_GET;
		$query['year'] = $yearInUrl;
		$query_result = http_build_query($query);
		$url_path = $_SERVER['PHP_SELF'];//I use this down there to make up the link of the clickable months!
		$path = $_SERVER['REQUEST_URI'];
		$_SESSION['path'] = $path;

		
		?>
		
		<form class="search" action="initial_page.php">
			<input type="search" name="search" placeholder="Books, authors, categories...">
			<button type="submit">Search</button>
			</form>
		<?php
		if(!isset($_GET['home']) AND !isset($_GET['search']) AND !isset($_GET['edit'])) { //This means that the tab with the months will only be shown when there are no 'home', 'search' and 'edit' with values in the url! That means the months will not be shown when the user logs in, when he/she searchs for something and when he/she edits information on books.
			$months = new BookEvent();

			$months->display_months_sidebar($id, $_GET['year']); //displays the sidebar with the information regarding the books read on each month of the year.
		}


		//DISPLAY BOOKS READ IN A YEAR!
		//This is how I got to display the books read in a especific month. 
		if(isset($_GET['year']) AND !isset($_GET['month'])){ // if there's values in year and no month
			$year = $_GET['year'];
			$uri = $_SESSION['path'];
			$check_position = strpos($uri, 'month');
			if($check_position == false){ //If there's no month in the uri, then display all the books read in the year! A more elegant solution...
				$display = new BookEvent();
				$display->display_books_year($id, $year);

			}
		}	

		//Display results from a search!
		if(isset($_GET['search'])){//When there's the term 'search' and 'submit' in the URL, then:
			$search = "%{$_GET['search']}%"; //This is how you use this variable with LIKE. You have to insert the $_GET inside {} and then use %!
			$search_displayed = str_replace("%", "", $search);
			echo "<p style='margin: 0 0 10px 0;'class='text_search_result'>Results for  \"".$search_displayed."\":</p>";
			$data = new BookEvent();
			$data->search($id, $search);
		}
		
		//Messages!

		

		//Error handler when book is deleted
		if(isset($_GET['del'])){

			if($_GET['del']=='success'){
					echo "<script>alert('The book you selected is no longer in your list!')</script>";
				}
		}

		?>

		<!-- EDIT MODAL -->		
		<div class="edit-modal">
			<div class="edit-modal-content">
				
			</div>
		</div>
			

		<?php
			if(isset($_GET['book'])){//Displaying individual book
				$book = new BookEvent();
				$book->showUniqueBook($_GET['book']);
			}


			//This is how I managed to display only the books read in the month selected:
			$data = new BookEvent();
			if(isset($_GET['month']) and isset($_GET['year'])){//And if there's value in year and month,
				$month_name = $_GET['month'];
				$year_number = $_GET['year'];

				$data->display_books_month($id, $month_name, $year_number);

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
		</div>
		<script src="javascript/main.js"></script>
		</body>
		</html>

<?php
	} ?>