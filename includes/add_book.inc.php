<?php 

	session_start();
	include "../classes/BookEvent.php";
	

	$book_title = $_POST['book'];
	$author_name = $_POST['author'];
	$category = $_POST['category'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	$classification = $_POST['classification'];//converts strings to integers
	if(empty($book_title) || empty($author_name) || empty($category) || empty($year) || empty($classification)){
			echo "You didn't fill in all the fields. Please, try again.";
		}
	else if(intval($classification)<0 || intval($classification)>100){
		echo "Please insert a valid classification!";
	}
	else if(intval($year)<1900 || intval($year) > 2100){
		echo "Please insert a valid year!";
	}
	else{	
		
		$data = new BookEvent();

		$data->add_category ($category);//Function I created that adds the category name into the DB if it's not already there.
		$data->add_year($year);

		
		$user_id = $_SESSION['id'];
		$category_id = $data->select_category_id($category);
		$month_id = $data->select_month_id($month);
		$year_id = $data->select_year_id($year);
		$task_date = date('d/m/Y');
		$hash_id = hash('sha256', date('D, d M Y H:i:s')); //it will generate a random number based on the date added. This number will be unique for each book.
		//$task_date = date('D, d M Y H:i:s'); //This is how you echo the date (with the year, month, day, hour, minutes and seconds)
		

		/*
		$_SESSION['book_title'] = $book_title;
		$_SESSION['author_name'] = $author_name;
		*/
		
		$data->add_book_event($user_id, $book_title, $author_name, $category_id, $month_id, $year_id, $classification, $task_date, $hash_id);
		$add_book_id = $data->get_add_book_id($user_id, $book_title);
		
		$data->download_book_cover($book_title, $author_name, $add_book_id); //first it will download the image and check to see if it's really there.
		echo $year; 
		
	}

	

/*
	if(empty($book_title) || empty($author_name) || empty($category) || empty($month) || empty($year)){
			echo "You didn't fill in all the fields. Please, try again.";
		}
		else if($classification != 'integer'){
			echo "Insert a valid classification!";
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


	
	*/



