<?php 

	session_start();
	include "dbh.inc.php";
	include "../classes/BookEvent.php";
	
	
	if(!isset($_POST['submit'])) {
		header("Location: ../index.php");
	}
	else {

		$book = $_POST['book'];
		$author = $_POST['author'];
		$category = $_POST['category'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$classification = $_POST['classification'];

		if(empty($book) || empty($author) || empty($category) || empty($month) || empty($year)){
			header("Location: ".$_SESSION['path']."&failed=empty");//This is a temporary fix. Still have to find a way to make the url not repeat itself every time the button is clicked!
		}
		else {
			$data = new BookEvent();

			$data->add_book_title($book, $classification); //Function I created that adds the book inserted by the user into the DB.
			$data->add_author ($author); //Function I created that adds the author's name into the DB if he/she is not already there.
			$data->add_category ($category);//Function I created that adds the category name into the DB if it's not already there.
			$data->add_year($year);

			
			
			
			$userId = $_SESSION['id'];
			$bookId = $data->select_book_id($book);
			$authorId = $data->select_author_id($author);
			$categoryId = $data->select_category_id($category);
			$monthId = $data->select_month_id($month);
			$yearId = $data->select_year_id($year);
			$task_date = date('d/m/Y');
			//$task_date = date('D, d M Y H:i:s'); //This is how you echo the date (with the year, month, day, hour, minutes and seconds)
			

			
			$_SESSION['book'] = $book;
			$_SESSION['bookId'] = $bookId;
			$_SESSION['author'] = $author;

			$data->download_book_cover($book, $bookId, $author); //first it will download the image and check to see if it's really there.
			
			$data->add_book_event($userId, $bookId, $authorId, $categoryId, $monthId, $yearId, $task_date);

			header("Location: ../initial_page.php?year=".$year."&month=".strtolower($month));
			 		
			
		}
	}

	
	



