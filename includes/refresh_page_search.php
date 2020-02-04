<?php
include "../classes/BookEvent.php";
session_start();
$id = $_SESSION['id'];
$search_term = $_POST['searchTerm'];


$book = new BookEvent();
$result = $book->refresh_books_search($id, $search_term);

foreach($result as $data){ ?>
	<div class="box"><?php
		$location = $book->get_book_cover_url($data['hash_id']);?>
		<img class="cover" src="<?php echo $location;?>">

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
			<button class="edit_book_button" onclick="editReadingEvent('<?php echo $data['hash_id']; ?>', true)"><img alt="edit books' information" src="images/edit.png"></button>
			<button onclick="deleteBook('<?php echo $data['hash_id']; ?>', <?php echo $data['year_number']; ?>)" class="delete_book_button"><img src="images/trash-can.svg"></button>
		</div>
	</div>
<?php
}