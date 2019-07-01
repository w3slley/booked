<?php 
	include "../classes/BookEvent.php";

	session_start();
	//Take all the information given from the edit_book() function. Including the book id and add book id task which are hidden(display: none).
	

	$book_title = $_POST['book_title'];
	$author_name = $_POST['author_name'];
	$catg_name = $_POST['catg_name'];
	$month_name = $_POST['month'];
	$year_number = $_POST['year_number'];
	$classification = $_POST['classification'];
	$book_id = $_POST['book_id']; //This was gathered from the url. It was first given by the add_books_year() function, which created a button that lead in the url edit=true, add_book_id=its number(taken from the database) and book_id = its number (also taken from the database).
	$add_book_id = $_POST['add_book_id']; //The same as the above.

	$data = new BookEvent();
	$data->update_info($add_book_id, $book_title, $author_name, $catg_name, $month_name, $classification);

	header("Location: ../initial_page.php?year=".$year_number."&month=".strtolower($month_name));
	/*
	update_book_title($conn, $book_title, $add_book_id);
	update_author_name($conn, $author_name, $add_book_id);
	update_category($conn, $catg_name, $add_book_id);
	update_month_finished($conn, $month_name, $add_book_id, $year_number, $month_name, $book_id);//This is long as fuck.. kkk. But it needed the month_name and book_id variables to give the location when throwing an error. U got to do what u got to do. ;D
	*/