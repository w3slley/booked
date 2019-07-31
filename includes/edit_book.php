<?php 
	include "../classes/BookEvent.php";

	session_start();
	//Take all the information given from the edit_book() function. Including the book id and add book id task which are hidden(display: none).
	
	if(isset($_POST['title'])){
		$book_title = $_POST['title'];
		$hash_id = $_POST['hash_id'];

		$data = new BookEvent();
		$data->update_book_title($hash_id, $book_title);
	}
	else if(isset($_POST['author'])){
		$author_name = $_POST['author'];
		$hash_id = $_POST['hash_id'];

		$data = new BookEvent();
		$data->update_author_name($hash_id, $author_name);
	}
	//I removed the update_category function because the user is not suposed to change that right now. Eventually I will implement a feature where the user will add their own categories. So, in the categories table it will have a column of user_id. Only the categories the user added can be changed.
	else if(isset($_POST['month'])){
		$month = $_POST['month'];
		$hash_id = $_POST['hash_id'];
		$data = new BookEvent();
		$data->update_month_finished($hash_id, $month);
	}
	
	else if(isset($_POST['classification'])){
		$classification = $_POST['classification'];
		$hash_id = $_POST['hash_id'];
		$data = new BookEvent();
		$data->update_classification($hash_id, $classification);
	}

	//I still have to figure out how the user will edit the year he/she read the book.

	
	//$year_number = $_POST['year']; I still have to implement the update of the year finished
