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
<div class="container">
	<div class="left">
		<?php
    if(isset($_GET['q'])){//When there's the term 'search' and 'submit' in the URL, then:
    	$search = "%{$_GET['q']}%"; //This is how you use this variable with LIKE. You have to insert the $_GET inside {} and then use %!
    	$search_displayed = str_replace("%", "", $search);
    	;
    	echo "<p style='margin: 0 0 10px 0;'class='text_search_result'>Results for  \"".strip_tags($search_displayed)."\":</p>";
    	/*
    	These are two functions which remove the tags of a possible javascript code used for xss atacks:
    	filter_var($search_displayed, FILTER_SANITIZE_STRING);
    	strip_tags($search_displayed);
    	I will leave the site vunerable so that I can discover new ways to hack it!
    	*/
    	$data->search($id, $search);
    }
?>
  </div>
  	<div class="right">
  		<form class="search" action="initial_page.php">
  			<input type="search" name="search" placeholder="Books, authors, categories...">
  			<button type="submit">Search</button>
  		</form>
    </div>
  </div>


    <div class="edit-modal">
    	<div class="edit-modal-content">
    	</div>
    </div>

    <?php include 'layouts/footer.php' ?>
    </div>
    <script src="javascript/main.js"></script>
  </body>
</html>
