<?php 

	session_start();
	include "dbh.inc.php";
	include "../classes/BookEvent.php";
	
	
	if(!isset($_POST['submit'])) {
		header("Location: ../index.php");
	}
	else {

		$book_title = $_POST['book'];
		$author_name = $_POST['author'];
		$category = $_POST['category'];
		$month = $_POST['month'];
		$year = $_POST['year'];
		$classification = $_POST['classification'];

		if(empty($book_title) || empty($author_name) || empty($category) || empty($month) || empty($year)){
			header("Location: ".$_SESSION['path']."&failed=empty");//This is a temporary fix. Still have to find a way to make the url not repeat itself every time the button is clicked!
		}
		else {
			$data = new BookEvent();

		
			$data->add_category ($category);//Function I created that adds the category name into the DB if it's not already there.
			$data->add_year($year);

			
			
			
			$user_id = $_SESSION['id'];
			$category_id = $data->select_category_id($category);
			$month_id = $data->select_month_id($month);
			$year_id = $data->select_year_id($year);
			$task_date = date('d/m/Y');
			//$task_date = date('D, d M Y H:i:s'); //This is how you echo the date (with the year, month, day, hour, minutes and seconds)
			

			
			$_SESSION['book_title'] = $book_title;
			$_SESSION['author_name'] = $author_name;
 
			$data->add_book_event($user_id, $book_title, $author_name, $category_id, $month_id, $year_id, $classification, $task_date);
			$add_book_id = $data->get_add_book_id($user_id, $book_title);
			
			$data->download_book_cover($book_title, $author_name, $add_book_id); //first it will download the image and check to see if it's really there.
			
			

			header("Location: ../initial_page.php?year=".$year."&month=".strtolower($month));
			 		
			
		}
	}

	
	



