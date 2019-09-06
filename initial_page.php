<?php
	session_start();
	include "classes/BookEvent.php";
	$id = $_SESSION['id'];
	$data = new BookEvent();

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
	$data->display_years_homepage($id);
	?>
	</div>

</div>

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
<div class="container">
	<div class="left">
		<?php
		//DISPLAY BOOKS READ IN A YEAR!
		//This is how I got to display the books read in a especific month.
		if(isset($_GET['year']) AND !isset($_GET['month'])){ // if there's values in year and no month
			$year = $_GET['year'];
			$uri = $_SESSION['path'];
			$check_position = strpos($uri, 'month');
			if($check_position == false){ //If there's no month in the uri, then display all the books read in the year! A more elegant solution...

				$data->display_books_year($id, $year);

			}
		} ?>
	</div>
	<div class="right">
		<form class="search" action="search.php">
			<input type="search" name="q" placeholder="Books, authors, categories...">
			<button type="submit">Search</button>
		</form>
		<?php
		if(!isset($_GET['home']) AND !isset($_GET['search']) AND !isset($_GET['edit']) AND !isset($_GET['book'])) { //This means that the tab with the months will only be shown when there are no 'home', 'search', 'edit' and 'book' (individual book parsed via hash_id) with values in the url! That means the months will not be shown when the user logs in, when he/she searchs for something and when he/she edits information on books.
			$data->display_months_sidebar($id, $_GET['year']); //displays the sidebar with the information regarding the books read on each month of the year.
		}
		?>
	</div>

</div>



<?php
//Display results from a search!
if(isset($_GET['search'])){//When there's the term 'search' and 'submit' in the URL, then:
	$search = "%{$_GET['search']}%"; //This is how you use this variable with LIKE. You have to insert the $_GET inside {} and then use %!
	$search_displayed = str_replace("%", "", $search);
	;
	echo "<p style='margin: 0 0 10px 0;'class='text_search_result'>Results for  \"".$search_displayed."\":</p>";
	/*
	These are two functions which remove the tags of a possible javascript code used for xss atacks:
	filter_var($search_displayed, FILTER_SANITIZE_STRING);
	strip_tags($search_displayed);
	I will leave the site vunerable so that I can discover new ways to hack it!
	*/
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
		if($data->showUniqueBook($_GET['book']) != False){
			$data->showUniqueBook($_GET['book']);
		}
		else{
			echo 'Your book was not found. Go to the <a href="dashboard.php">Dashboard</a>';
		}
	}


	//This is how I managed to display only the books read in the month selected:

	if(isset($_GET['month']) and isset($_GET['year'])){//And if there's value in year and month,
		$month_name = $_GET['month'];
		$year_number = $_GET['year'];

		$data->display_books_month($id, $month_name, $year_number);

	}
?>

<?php include 'layouts/footer.php' ?>
</div>
<script src="javascript/main.js"></script>
</body>
</html>
