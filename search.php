<?php
	session_start();
	include "classes/BookEvent.php";
	$id = $_SESSION['id'];
	$book = new BookEvent;

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
	<div class="years"><?php
		$result = $book->display_years_homepage($id);
		foreach($result as $data){ ?>
			<a id="year-unit" href="initial_page.php?year=<?php echo $data['year_number']?>" onclick='giveId()'><?php echo $data['year_number']?></a>
<?php
		} ?>
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
    	$searchBook = $book->search($id, $search);
			foreach($searchBook as $data){ ?>

			<div class="box"><?php
				$location = $book->get_book_cover_url($data['hash_id']);?>
				<img class="cover" src="<?php echo $location;?>">';

				<div class="book_info">
					<p class="title"><?php echo $data['book_title']; ?></p>
					<p class="author">Author: <?php echo $data['author_name']; ?></p>
					<p class="category">Category: <?php echo $data['catg_name']; ?></p>
					<p class="month">Month finished: <?php echo $data['month_name']; ?></p>
					<p class="year">Year finished: <?php echo $data['year_number']; ?></p>
					<p class="date">Date added: <?php echo $data['task_date']; ?></p>
				</div>
				<div>
					<input hidden class="delete_book_input" value="<?php echo $data['hash_id'] ?>">
					<button class="edit_book_button" onclick="editReadingEvent('<?php echo $data['hash_id']; ?>')"><img alt="edit books' information" src="images/edit.png"></button>
					<button onclick="deleteBook('<?php echo $data['hash_id']; ?>', <?php echo $data['year_number']; ?>)" class="delete_book_button"><img src="images/trash-can.svg"></button>
				</div>
			</div>
			<?php
			}
    }
?>
  </div>
  	<div class="right">
  		<form class="search">
  			<input type="search" name="q" placeholder="Books, authors, categories...">
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
