<?php
	include "classes/BookEvent.php";
	session_start();
	$id = $_SESSION['id'];
	$book = new BookEvent();

	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Booked | Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<?php include 'layouts/links.php'; ?>
</head>
<body>
	<div class="modal">
		<div class="modal-content">
			<span class="close">&times;</span>
			<form class="nav-add" method="POST" action="includes/add_book.inc.php">
				<input class="book-title" type="text" name="book" placeholder="Book title"><br>
				<input class="author-name" type="text" name="author" placeholder="Author"><br>
				<input class="category" type="text" name="category" placeholder="Category"><br>
				<?php
					echo $book->display_months();
				?><br>
				<input class="year" type="text" name="year" placeholder="Year finished"><br>
				<input class="classification" type="text" name="classification" placeholder="Your grade (0-100)"><br>
				<button type="submit" name="submit">Add book</button>
				<p class="message"></p>
			</form>
			
		</div>
		<div class="loading-modal">
			<div class="loader"></div>
		</div>
	</div>

	<div class="container">
			<?php include 'layouts/nav.php'; ?>
			<div class="body-div">
<?php
				$result = $book->display_years_homepage($id);
				foreach($result as $data){
					echo "<a id='year-unit' href='initial_page.php?year=".$data['year_number']."' onclick='giveId()'>".$data['year_number']." </a>";
				}?>
				<form class="search" action="search.php">
					<input type="search" name="q" placeholder="Books, authors, categories...">
					<button type="submit">Search</button>
				</form>
<?php
					$data = $book->last_reading_event($id);
					$total = $book->total_books($id);
					if($total != 0){
?>
				<div class="last-book-added">
					<h1>The last book you read:</h1>
					<img src="<?php echo $data['book_cover_url']; ?>">
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
				//This is how I will create a feature that tells users how many books they read in the current month!
				$month = Date('F'); //This is how you get the full month name (current)
				$year = Date('Y'); //This is how you get the full year number (current)
				$number = $book->books_read_current_month($id, $month, $year);
?>
				<div class="total-month">
					<p>You read <?php echo $number; ?> books this month!</p>
				</div>
			</div>

			<?php include 'layouts/footer.php'; ?>

	</div>

	<script src="javascript/dashboard.js"></script>
</body>
</html>
