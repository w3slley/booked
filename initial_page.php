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
			<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display|Poiret+One|Dosis" rel="stylesheet">
			<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
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
			<nav class="nav">
				
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
		$yearInUrl = substr($url, $year_url_initial, 4); //This works like variable[0:5] in python... substr(string, start, lenght)
		
		
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
			$data = new BookEvent();

			echo '
			<div class="months">
				<p class="books_year">All year: '.$data->books_read_year($id, $yearInUrl).' books!</p>
				<ul id="month_names">			
					
					<li><a class="January" href="'.$url_path.'?year='.$yearInUrl.'&month=january">January: '.$data->books_read_month($id, $yearInUrl, 'January').'</a></li>
					<li><a class="February"  href="'.$url_path.'?year='.$yearInUrl.'&month=february">February: '.$data->books_read_month($id, $yearInUrl, 'February').'</a></li>
					<li><a class="March"  href="'.$url_path.'?year='.$yearInUrl.'&month=march">March: '.$data->books_read_month($id, $yearInUrl, 'March').'</a></li>
					<li><a class="April"  href="'.$url_path.'?year='.$yearInUrl.'&month=april">April: '.$data->books_read_month($id, $yearInUrl, 'April').'</a></li>
					<li><a class="May"  href="'.$url_path.'?year='.$yearInUrl.'&month=may">May: </a>'.$data->books_read_month($id, $yearInUrl, 'May').'</a></li>
					<li><a  class="June"  href="'.$url_path.'?year='.$yearInUrl.'&month=june">June: '.$data->books_read_month($id, $yearInUrl, 'June').'</a></li>
					<li><a  class="July"  href="'.$url_path.'?year='.$yearInUrl.'&month=july">July: '.$data->books_read_month($id, $yearInUrl, 'July').'</a></li>
					<li><a  class="August"  href="'.$url_path.'?year='.$yearInUrl.'&month=august">August: '.$data->books_read_month($id, $yearInUrl, 'August').'</a></li>
					<li><a class="September"  href="'.$url_path.'?year='.$yearInUrl.'&month=september">September: '.$data->books_read_month($id, $yearInUrl, 'September').'</a></li>
					<li><a class="October"  href="'.$url_path.'?year='.$yearInUrl.'&month=october">October: '.$data->books_read_month($id, $yearInUrl, 'October').'</a></li>
					<li><a class="November"  href="'.$url_path.'?year='.$yearInUrl.'&month=november">November: '.$data->books_read_month($id, $yearInUrl, 'November').'</a></li>
					<li><a class="December" href="'.$url_path.'?year='.$yearInUrl.'&month=december">December: '.$data->books_read_month($id, $yearInUrl, 'December').' </a></li>
				</ul>
			</div>
			';
		}
		//DISPLAY BOOKS READ IN A YEAR!
		//This is how I got to display the books read in a especific month. 
		if(isset($_GET['year'])){ // if there's values in year and month
			$year = $_GET['year'];
			$uri = $_SESSION['path'];
			$check_position = strpos($uri, 'month');
			if($check_position == false){ //If there's not month in the uri, then display all the books! A more elegant solution...
				$display = new BookEvent();
				while (!empty($display->display_books_year($id, $year))){
					$display->display_books_year($id, $display->get_smallest_year());//Here goes the initial year in the database. Created a function that gets the smallest number from the year column!
					$year++;
						//This is a much more elegant solution. I created a while loop that until there's no result from the database it will continue to display the books read in that particular year. And in the end, it adds 1 to the year variable so it can do it again in the next year. Good job mate!
					}
			}
		//If there's value in the month, nothing will happen because it will show the results of the books read in the particular month.
		}	

		//Display results from a search!
		if(isset($_GET['search'])){//When there's the term 'search' and 'submit' in the URL, then:
			$search = "%{$_GET['search']}%"; //This is how you use this variable with LIKE. You have to insert the $_GET inside {} and then use %!
			$search_displayed = str_replace("%", "", $search);
			echo "<p style='margin: 0 0 10px 0;'class='text_search_result'>Results for  \"".$search_displayed."\":</p>";
			$data = new BookEvent();
			$data->search($id, $search);
		}
		//Display books when the user click the 'edit' button!	
		if(isset($_GET['edit'])) {////When there's the term 'edit' in the URL, then:
			if($_GET['edit']=='true'){
				$add_book_id = $_GET['add_book'];
				$book_id = $_GET['book_id'];
				$location = 'bookcovers/bookcover'.$book_id.'.jpg';

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


		//Error handler when book is deleted
		if(isset($_GET['del'])){

			if($_GET['del']=='success'){

					echo "<script>alert('The book you selected is no longer in your list!')</script>";
					
					//header("Location: initial_page.php?year=".$_GET['year']);
				}
		}


		//Action:

		
		
		//ADD NEW BOOK COVER FROM THE EDIT SECTION
		if(isset($_GET['addCover'])){
			$add_book_id= $_GET['add_book'];
			if($_GET['addCover'] == 'true'){
				$download = new BookEvent();
				$download->download_book_cover_edit($add_book_id);
				$url = $_SERVER['QUERY_STRING'];
				$newUrl = str_replace('&addCover=true', '', $url);
				//header('Location: initial_page.php?'.$newUrl);	//This is supose to solve the problem I'm having with the page not showing the new book cover image.
			}
			
				
		}

		?>

		<!-- EDIT MODAL -->		
		<div class="edit-modal">
			<div class="edit-modal-content">
				
			</div>
		</div>
			


		<?php
			//This is how I managed to display only the books read in the month selected:
			
			$data = new BookEvent();
			if(isset($_GET['month']) and isset($_GET['year'])){//And if there's value in year and month,
				$month_name = $_GET['month'];
				$year_number = $_GET['year'];

				//And if month is equal to these values,
				if($month_name == "january"){
					echo '<p class="text-month">Books read in january of '.$year_number.':</p>';
					$data->display_books_month($id, $month_name, $year_number);

				}
				elseif($month_name == "february"){
					echo '<p class="text-month">Books read in february of '.$year_number.':</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				elseif($month_name == "march"){
					echo '<p class="text-month">Books read in march of '.$year_number.':</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				elseif($month_name == "april"){
					echo '<p class="text-month">Books read in april of '.$year_number.':</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				elseif($month_name == "may"){
					echo '<p class="text-month">Books read in may of '.$year_number.':</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				elseif($month_name == "june"){
					echo '<p class="text-month">Books read in june of '.$year_number.':</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				elseif($month_name == "july"){
					echo '<p class="text-month">Books read in july of '.$year_number.':</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				elseif($month_name == "august"){
					echo '<p class="text-month">Books read in august of '.$year_number.':</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				elseif($month_name == "september"){
					echo '<p class="text-month">Books read in september of '.$year_number.':</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				elseif($month_name == "october"){
					echo '<p class="text-month">Books read in october of '.$year_number.':</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				elseif($month_name == "november"){
					echo '<p class="text-month">Books read in november of '.$year_number.':</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				elseif($month_name == "december"){
					echo '<p class="text-month">Books read in december of '.$year_number.':</p>';
					$data->display_books_month($id, $month_name, $year_number);	
				}
				//Else, nothing is displayed.
				
			}
		?>

		<script src="javascript/main.js"></script>
		</body>
		</html>

<?php
	} ?>