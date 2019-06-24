<?php 
	
	include "dbh.inc.php";
	include "../classes/BookEvent.php";

	session_start();
	//Take all the information given from the edit_book() function. Including the book id and add book id task which are hidden(display: none).
	

	$book_title = $_POST['book_title'];
	$author_name = $_POST['author_name'];
	$catg_name = $_POST['catg_name'];
	$month_name = $_POST['month'];
	$year_number = $_POST['year_number'];
	$book_id = $_POST['book_id']; //This was gathered from the url. It was first given by the add_books_year() function, which created a button that lead in the url edit=true, add_book_id=its number(taken from the database) and book_id = its number (also taken from the database).
	$add_book_id = $_POST['add_book_id']; //The same as the above.

	function update_book_title ($conn, $book_title, $add_book_id) {//Updates the book's title!
		$sql = "UPDATE add_book
		JOIN users ON user_id = users.id
		JOIN books ON book_id = books.id
		JOIN authors ON author_id = authors.id
		JOIN categories ON catg_id = categories.id
		JOIN month_finished ON month_id = month_finished.id
		JOIN year_finished ON year_id = year_finished.id
		SET book_title = ? WHERE add_book.id = ?;";

		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			echo "MYSQL ERROR";
		}
		else {
			mysqli_stmt_bind_param($stmt, 'si', $book_title, $add_book_id);
			mysqli_stmt_execute($stmt);
		}		
	}

	function update_author_name ($conn, $author_name, $add_book_id) {//Updates the author's name
		$sql = "UPDATE add_book
		JOIN users ON user_id = users.id
		JOIN books ON book_id = books.id
		JOIN authors ON author_id = authors.id
		JOIN categories ON catg_id = categories.id
		JOIN month_finished ON month_id = month_finished.id
		JOIN year_finished ON year_id = year_finished.id
		SET author_name = ? WHERE add_book.id = ?;";

		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			echo "MYSQL ERROR";
		}
		else {
			mysqli_stmt_bind_param($stmt, 'si', $author_name, $add_book_id);
			mysqli_stmt_execute($stmt);
		}		
	}

	function update_category ($conn, $category, $add_book_id) {//Updates the category's name
		$data = new BookEvent();
		$data->add_category($category); //adds the category if it's not in the DB yet. If it is, nothing happens because:
		$catg_id = $data->select_category_id($category); //this will select the id of the category.
		$sql = "UPDATE add_book
		JOIN users ON user_id = users.id
		JOIN books ON book_id = books.id
		JOIN authors ON author_id = authors.id
		JOIN categories ON catg_id = categories.id
		JOIN month_finished ON month_id = month_finished.id
		JOIN year_finished ON year_id = year_finished.id
		SET catg_id = ? WHERE add_book.id = ?;";

		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			echo "MYSQL ERROR";
		}
		else {
			mysqli_stmt_bind_param($stmt, 'ii', $catg_id, $add_book_id);
			mysqli_stmt_execute($stmt);
		}		
	}

	function update_month_finished ($conn, $month, $add_book_id, $year_number, $month_name, $book_id) {//Updates the category's name
		$data = new BookEvent();
		$month_id = $data->select_month_id($month); //this will select the id of the category.
		if(empty($month_id)) {
			header("Location: ../initial_page.php?edit=true&add_book=".$add_book_id."&book_id=".$book_id."&error=month");//if the month is not in the database, then it will give an error saying that the month is not valid!
		}
		else {
			$sql = "UPDATE add_book
			JOIN users ON user_id = users.id
			JOIN books ON book_id = books.id
			JOIN authors ON author_id = authors.id
			JOIN categories ON catg_id = categories.id
			JOIN month_finished ON month_id = month_finished.id
			JOIN year_finished ON year_id = year_finished.id
			SET month_id = ? WHERE add_book.id = ?;";

			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				echo "MYSQL ERROR";
			}
			else {
				mysqli_stmt_bind_param($stmt, 'ii', $month_id, $add_book_id);
				mysqli_stmt_execute($stmt);
				header("Location: ../initial_page.php?update=success&year=".$year_number."&month=".strtolower($month_name)."");
			}		
		}
		
	}
	
	update_book_title($conn, $book_title, $add_book_id);
	update_author_name($conn, $author_name, $add_book_id);
	update_category($conn, $catg_name, $add_book_id);
	update_month_finished($conn, $month_name, $add_book_id, $year_number, $month_name, $book_id);//This is long as fuck.. kkk. But it needed the month_name and book_id variables to give the location when throwing an error. U got to do what u got to do. ;D
	