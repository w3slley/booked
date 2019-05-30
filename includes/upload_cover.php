<?php 
	session_start();
	include "functions.php";
	include "dbh.inc.php";


	// $_SESSION['book'] = $book;
	// $_SESSION['bookId'] = $bookId;
	// $_SESSION['author'] = $author;

		//GET THE URL FROM THE DATABASE

		
		function get_url_cover ($conn, $book) { //Get the url_cover from DB
			$sql = "SELECT url_cover FROM books WHERE book_title = ?;";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				echo "MYSQL ERROR";
			}
			else {
				mysqli_stmt_bind_param($stmt, 's', $book);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				$book_cover_result = mysqli_fetch_assoc($result);
				$book_cover_id = $book_cover_result['url_cover'];
				return $book_cover_id;
			}
		}
		

		
		function add_cover_folder ($img_url, $bookId){
			$img_name = basename($img_url); //the basename function gets the name of the file - in this case, the image name and extention.
			$img_ext_init_pos = strpos($img_name, '.');
			$img_ext = substr($img_name, $img_ext_init_pos+1, 5);//This gets the image extention!
			$location = '../images/bookcover'.$bookId.'.'.$img_ext;

			file_put_contents($location, file_get_contents($img_url));
			//This is how you download a image file with the URL to your computer using PHP!!
		}

	

	// get_book_cover('Origem das espécies', 35, 'Charles Darwin');
