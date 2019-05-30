<?php 
	session_start();
	include "classes/BookEvent.php";
	include "includes/dbh.inc.php";

	if(!isset($_SESSION['first_name'])){
		header("Location: index.php");
	}
	else {
		?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Booked! Add the books you read througout the year.</title>

			<link rel="stylesheet" type="text/css" href="css/initial_page.css">
			<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display|Poiret+One" rel="stylesheet">
			<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
				
			
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
					<button class= "add-img" type="submit" name="submit" onclick="alert('Wait while we are setting everything up...')"><img src="plus2.png"></button>
				</form>
				<?php  
					$id = $_SESSION['id'];

					if(isset($_GET['failed'])){
						$failed = $_GET['failed'];

						if($failed == 'empty') {
							echo "<p id='message-add'>You didn't fill in all the fields. Please, try again.</p>";
						}
					}

				?>
				<form method="POST" action="includes/logout.inc.php">
					<button class="logout-button" type="submit" name="submit">Logout</button>
				</form>
				<a class="profile" href="profile.php">Profile</a>
				
				
			
			</nav>
		<?php
			if(isset($_GET['home'])){
			$home = $_GET['home'];
			if($home = 'success'){
				echo "<p class='choose'> Choose a year!</p>";
			}
			
		}
		?>
		


		</form>

		<div class="navbar"> <!-- For now, you can only add books read from 2014 on(it takes from the database). Have to find a way so that the user can add the year he/she wants -->
			<a href="dashboard.php"><img class="home-icon" src="home.png"></a>
			<?php
			$years_nav = new BookEvent();
			$years_nav->display_years_homepage($id); //I need to fix this so that the user will see only the years which he/she added books.

			?>
			<form class="search" action="initial_page.php">
			<input type="search" name="search" placeholder="Books, authors, categories...">
			<button type="submit" name="submit">Search</button>
			</form>
		</div>

		<br>
			
		<?php 

		//This is how I managed to solve the problem with the links. I created a variable with the url path to the file to insert in the href and searched inside it to find the year the users is at. I also inserted this year into the href link.

		$url = $_SERVER['REQUEST_URI']; //This is how you get the current URL from the SERVER!! That's pretty usefull.
		$year_url_initial = strpos($url, '2'); 
		$yearInUrl = substr($url, $year_url_initial, 4); //This works like variable[0:5] in python... substr(string, start, lenght)
		
		

		
		
		//The links will take the year from the url! #I also added a new function (books_read_month and books_read_year) that output the number of books read in that particular month and year, respectively!

		$query = $_GET;
		$query['year'] = $yearInUrl;
		$query_result = http_build_query($query);
		$url_path = $_SERVER['PHP_SELF'];//I use this down there to make up the link of the clickable months!
		$path = $_SERVER['REQUEST_URI'];
		$_SESSION['path'] = $path;

		
		
		if(!isset($_GET['home']) AND !isset($_GET['search']) AND !isset($_GET['edit']) AND !isset($_GET['del'])) { //This means that the tab with the months will only be shown when there are no 'home', 'search' and 'edit' with values in the url! That means the months will not be shown when the user logs in, when he/she searchs for something and when he/she edits information on books.
			$data = new BookEvent();

			echo '
			<div class="months">
				<p class="books_year">All year: '.$data->books_read_year($id, $yearInUrl).' books!</p>
				<ul id="month_names">			
					
					<li><a href="'.$url_path.'?year='.$yearInUrl.'&month=january">January: </a>'.$data->books_read_month($id, $yearInUrl, 'January').'</li>
					<li><a href="'.$url_path.'?year='.$yearInUrl.'&month=february">February: </a>'.$data->books_read_month($id, $yearInUrl, 'February').'</li>
					<li><a href="'.$url_path.'?year='.$yearInUrl.'&month=march">March: </a>'.$data->books_read_month($id, $yearInUrl, 'March').'</li>
					<li><a href="'.$url_path.'?year='.$yearInUrl.'&month=april">April: </a>'.$data->books_read_month($id, $yearInUrl, 'April').'</li>
					<li><a href="'.$url_path.'?year='.$yearInUrl.'&month=may">May: </a>'.$data->books_read_month($id, $yearInUrl, 'May').'</li>
					<li><a href="'.$url_path.'?year='.$yearInUrl.'&month=june">June: </a>'.$data->books_read_month($id, $yearInUrl, 'June').'</li>
					<li><a href="'.$url_path.'?year='.$yearInUrl.'&month=july">July: </a>'.$data->books_read_month($id, $yearInUrl, 'July').'</li>
					<li><a href="'.$url_path.'?year='.$yearInUrl.'&month=august">August: </a>'.$data->books_read_month($id, $yearInUrl, 'August').'</li>
					<li><a href="'.$url_path.'?year='.$yearInUrl.'&month=september">September: </a>'.$data->books_read_month($id, $yearInUrl, 'September').'</li>
					<li><a href="'.$url_path.'?year='.$yearInUrl.'&month=october">October: </a>'.$data->books_read_month($id, $yearInUrl, 'October').'</li>
					<li><a href="'.$url_path.'?year='.$yearInUrl.'&month=november">November: </a>'.$data->books_read_month($id, $yearInUrl, 'November').'</li>
					<li><a href="'.$url_path.'?year='.$yearInUrl.'&month=december">December: </a>'.$data->books_read_month($id, $yearInUrl, 'December').'</li>
				</ul>
			</div>
			';
		}
		//DISPLAY BOOKS READ IN A YEAR!
		//This is how I got to display the books read in a especific month. 
		if(isset($_GET['year']) and isset($_GET['month'])){ // if there's values in year and month
			$year = $_GET['year'];
			$month = $_GET['month'];			

			if($month==''){//If there's value in the month, nothing will happen because it will show the results of the books read in the particular month.
				$display = new BookEvent();
				while (!empty($display->display_books_year($id, $year))){
					$display->display_books_year($id, $display->get_smallest_year());//Here goes the initial year in the database. Created a function that gets the smallest number from the year column!
					$year++;
						//This is a much more elegant solution. I created a while loop that until there's no result from the database it will continue to display the books read in that particular year. And in the end, it adds 1 to the year variable so it can do it again in the next year. Good job mate!
					}
				}							 
			}

		//Display results from a search!
		if(isset($_GET['search']) and isset($_GET['submit'])){//When there's the term 'search' and 'submit' in the URL, then:
			$search = "%{$_GET['search']}%"; //This is how you use this variable with LIKE. You have to insert the $_GET inside {} and then use %!
			$search_displayed = str_replace("%", "", $search);
			echo "<p class='text_search_result'>Results for:  \"".$search_displayed."\".</p>";
			$data = new BookEvent();
			$data->search($id, $search);
		}
		//Display books when the user click the 'edit' button!	
		if(isset($_GET['edit'])) {////When there's the term 'edit' in the URL, then:
			if($_GET['edit']=='true'){
				$add_book_id = $_GET['add_book'];
				$book_id = $_GET['book_id'];
				$location = 'images/bookcover'.$book_id.'.jpg';

				$edit = new BookEvent();
				$edit->display_edit_book($id, $book_id, $add_book_id, $location);//Executes the function that displays the box with the values the user can edit.
			}
		}

		//Messages!

		//Book added to the database:
		if(isset($_GET['add'])) { //It will be shown when the user adds a new book to the list of books read. It will pop up a message saying the book was added.
			$add = $_GET['add'];
			$message = "Your book was added!";

			if($add == 'success'){
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
		}
		//Book edited:
		/*if(isset($_GET['update'])) { //This will be displayed when the user edits a book. It will pop up a message saying the book was edited!
			$update = $_GET['update'];
			$message = "Your book was edited!";

			if($update == 'success'){
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
		}*/

		//Invalid month:
		if(isset($_GET['error'])){ //If the month iserted when editing is not valid, a message will appear.
			if($_GET['error'] == 'month'){
				echo "<script type='text/javascript'>alert('Please, insert a valid month name.');</script>";
			}
		}

		//Procedure to delete the book from list:
		if(isset($_GET['delete'])){
			$delete_add_book = $_GET['delete'];
			$delete = new BookEvent();
			$delete->delete_book($delete_add_book);
			//display a message saying that the book was deleted!
		}
		if(isset($_GET['del'])){
			if($_GET['del']=='success'){
					echo "<p class='message_delete'>The book you selected is no longer in your list!</p>";
				}
		}


		//Action:

		//Delete book cover:
		if(isset($_GET['cover'])){
			$id_book = $_GET['book_id'];
			$add_book_id = $_GET['add_book'];
			if($_GET['cover'] = 'delete'){
				$delete = new BookEvent();
				$delete->delete_book_cover($id_book, $add_book_id);

			}
			elseif($_GET['cover'] == 'deleteSuccess'){
				//display a message saying that the book's cover was deleted!
			}		
		}
		//ADD NEW BOOK COVER FROM THE EDIT SECTION
		if(isset($_GET['addCover'])){
			$add_book_id= $_GET['add_book'];
			if($_GET['addCover'] == 'true'){
				$download = new BookEvent();
				$download->download_book_cover_edit($add_book_id);
				$url = $_SERVER['QUERY_STRING'];
				$newUrl = str_replace('&addCover=true', '', $url);
				header('Location: initial_page.php?'.$newUrl);	//This is supose to solve the problem I'm having with the page not showing the new book cover image.
			}
			
				
		}



		?>


		<?php
			//This is how I managed to display only the books read in the month selected:
			
			$data = new BookEvent();
			if(isset($_GET['month']) and isset($_GET['year'])){//And if there's value in year and month,
				$month_name = $_GET['month'];
				$year_number = $_GET['year'];

				//And if month is equal to these values,
				if($month_name == "january"){
					echo '<p class="text-month">Books read in january:</p>';
					$data->display_books_month($id, $month_name, $year_number);

				}
				elseif($month_name == "february"){
					echo '<p class="text-month">Books read in february:</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				elseif($month_name == "march"){
					echo '<p class="text-month">Books read in march:</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				elseif($month_name == "april"){
					echo '<p class="text-month">Books read in april:</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				elseif($month_name == "may"){
					echo '<p class="text-month">Books read in may:</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				elseif($month_name == "june"){
					echo '<p class="text-month">Books read in june:</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				elseif($month_name == "july"){
					echo '<p class="text-month">Books read in july:</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				elseif($month_name == "august"){
					echo '<p class="text-month">Books read in august:</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				elseif($month_name == "september"){
					echo '<p class="text-month">Books read in september:</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				elseif($month_name == "october"){
					echo '<p class="text-month">Books read in october:</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				elseif($month_name == "november"){
					echo '<p class="text-month">Books read in november:</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				elseif($month_name == "december"){
					echo '<p class="text-month">Books read in december:</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				//Else, nothing is displayed.
				
			}
		?>

		<script src="javascript/javascript.js"></script>
		</body>
		</html>

<?php
	} ?>