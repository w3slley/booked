<?php
	session_start();
	include "classes/BookEvent.php";
	$id = $_SESSION['id'];
	$book = new BookEvent;
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

	if(!isset($id)){
		header("Location: index.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Booked | Keep track of books you read!</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<?php include 'layouts/links.php' ?>
</head>
<body>
<div class="body">
	<?php include 'layouts/addBook-modal.php'; ?>
	<?php include 'layouts/nav.php'; ?>

<div class="navbar">
	<a href="dashboard.php"><img class="home-icon" src="images/home.png"></a>
	<div class="years">
	<?php
	$result = $book->display_years_homepage($id);
	foreach($result as $data){ ?>
		<a id="year-unit" href="initial_page.php?year=<?php echo $data['year_number']?>" onclick='giveId()'><?php echo $data['year_number']?></a>
<?php
	}
?>
	</div>
</div>

<div class="container">
	<div class="left"><?php
		//DISPLAY BOOKS READ IN A YEAR!
		//This is how I got to display the books read in a especific month.
		if(isset($_GET['year']) AND !isset($_GET['month'])){ // if there's values in year and no month
			$year = $_GET['year'];
			$uri = $_SESSION['path'];
			$check_position = strpos($uri, 'month');
			if(!$check_position){ //If there's no month in the uri, then display all the books read in the year! A more elegant solution...
				$booksYear = $book->display_books_year($id, $year);
				if(empty($booksYear)){ ?>
					<p style="color: white; font-size:30px; margin:0 0 5px 15px">Books not found. Go to <a style="color: white" href="dashboard.php">dashboard</a></p>';
	<?php	}
				else{ //When there are books in the database they are displayed in the page.
?>
					<div class="books">'
						<p style="color: white; font-size:30px; margin:0 0 5px 15px">Books read in <?php echo strip_tags($year); ?>:</p>
<?php
						foreach($booksYear as $data){
							$location = $book->get_book_cover_url($data['hash_id']);?>

							<div class="box" value="<?php echo $data['month_name'] ?>">
								<img class="cover" src="<?php echo $location; ?>">';
								<div class="book_info">
									<p class="title"><?php echo $data['book_title']; ?></p> <br>
									<p class="author">Author: <span><?php echo $data['author_name']; ?></span></p>
									<p class="category">Category: <span><?php echo $data['catg_name']; ?></span></p>
									<p class="month">Month finished: <span><?php echo $data['month_name']; ?></span></p>
									<p class="date">Date added: <span><?php echo $data['task_date']; ?></span></p>
									<div class="rating">
										<p><span class="grade"><?php echo $data['classification']?></span></p>
									</div>
								</div>
								<div><!-- The data goes from here to the javascript.js file and then I use AJAX to pass the data to an includes file called delete_book.php and from there the book is deleted! -->
									<input hidden class="delete_book_input" value="<?php echo $data['hash_id'] ?>">
									<button class="edit_book_button" onclick="editReadingEvent('<?php echo $data['hash_id']; ?>')"><img alt="edit books' information" src="images/edit.png"></button>
									<button onclick="deleteBook('<?php echo $data['hash_id']; ?>', <?php echo $data['year_number']; ?>)" class="delete_book_button"><img src="images/trash-can.svg"></button>
								</div>
							</div><?php
						} ?>
				</div> <?php
				}
			}
		}

			//This is how I managed to display only the books read in the month selected:
			if(isset($_GET['month']) and isset($_GET['year'])){//And if there's value in year and month,
				$month_name = $_GET['month'];
				$year_number = $_GET['year'];

				$book->display_books_month($id, $month_name, $year_number);

			}
?>
	</div>
	<div class="right">
		<form class="search" action="search.php">
			<input type="search" name="q" placeholder="Books, authors, categories...">
			<button type="submit">Search</button>
		</form>
		<?php
		if(!isset($_GET['home']) AND !isset($_GET['search']) AND !isset($_GET['edit']) AND !isset($_GET['book'])) { //This means that the tab with the months will only be shown when there are no 'home', 'search', 'edit' and 'book' (individual book parsed via hash_id) with values in the url! That means the months will not be shown when the user logs in, when he/she searchs for something and when he/she edits information on books.
			$book->display_months_sidebar($id, $_GET['year']); //displays the sidebar with the information regarding the books read on each month of the year.
		}
		?>
	</div>
</div>

<?php
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
		if($book->showUniqueBook($_GET['book'])){
			$book->showUniqueBook($_GET['book']);
		}
		else{
			echo 'Your book was not found. Go to the <a href="dashboard.php">Dashboard</a>';
		}
	}
?>

<?php include 'layouts/footer.php' ?>
</div>
<script src="javascript/main.js"></script>
</body>
</html>
