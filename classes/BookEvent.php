<?php 
	include "Database.php";

	class BookEvent extends Database{
		private $user_id;

		private $book_title;
		private $author_name;
		private $category;
		
		private $book_id;
		private $author_id;
		private $category_id;
		

		private $month;
		private $month_id;
		private $year;
		private $year_id;

		public function add_book_event($user_id, $book_id, $author_id, $category_id, $month_id, $year_id, $task_date){

			$this->user_id = $user_id;
			$this->book_id = $book_id;
			$this->author_id = $author_id;
			$this->category_id = $category_id;
			$this->month_id = $month_id;
			$this->year_id = $year_id;

			$sql = "INSERT INTO add_book (user_id, book_id, author_id, catg_id, month_id, year_id, task_date) VALUES (?, ?, ?, ?, ?, ?, ?)";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id, $this->book_id, $this->author_id, $this->category_id, $this->month_id, $this->year_id, $task_date ]);

		}

		public function add_book_title($book_title){
			$this->book_title = $book_title;

			$sql = "SELECT * FROM books WHERE book_title = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->book_title]);
			$result = $stmt->fetch();

			if(empty($result)){
				$sql2 = "INSERT INTO books (book_title) VALUES (?)";
				$stmt2 = $this->connect()->prepare($sql2);
				$stmt2->execute([$this->book_title]);
			}
		}

		public function add_author($author_name){
			$this->author_name = $author_name;

			$sql = "SELECT * FROM authors WHERE author_name = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->author_name]);
			$result = $stmt->fetch();

			if(empty($result)){
				$sql2 = "INSERT INTO authors (author_name) VALUES (?)";
				$stmt2 = $this->connect()->prepare($sql2);
				$stmt2->execute([$this->author_name]);
			}

		}

		public function add_category($category){
			$this->category = $category;

			$sql = "SELECT * FROM categories WHERE catg_name = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->category]);
			$result = $stmt->fetch();

			if(empty($result)){
				$sql2 = "INSERT INTO categories (catg_name) VALUES (?)";
				$stmt2 = $this->connect()->prepare($sql2);
				$stmt2->execute([$this->category]);
			}

		}
		
		public function add_year($year){
			$this->year = $year;

			$sql = "SELECT * FROM year_finished WHERE year_number = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->year]);
			$result = $stmt->fetch();

			if(empty($result)){
				$sql2 = "INSERT INTO year_finished (year_number) VALUES (?)";
				$stmt2 = $this->connect()->prepare($sql2);
				$stmt2->execute([$this->year]);
			}

		}

		public function select_month_id($month){
			$this->month = $month;

			$sql = "SELECT id FROM month_finished WHERE month_name = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->month]);

			$result = $stmt->fetch();
			if(!empty($result)){
				return $result['id'];
			}
			else{
				echo "There's no data in the DB that match these criteria.";
			}

		}

		public function select_year_id($year){
			$this->year = $year;

			$sql = "SELECT id FROM year_finished WHERE year_number = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->year]);

			$result = $stmt->fetch();
			if(!empty($result)){
				return $result['id'];
			}
			else{
				echo "There's no data in the DB that match these criteria.";
			}
			
		}

		public function select_book_id($book_title){
			$this->book_title = $book_title;

			$sql = "SELECT id FROM books WHERE book_title = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->book_title]);
			$result = $stmt->fetch();
			if(!empty($result)){
				return $result['id'];
			}
			else{
				echo "There's no data in the DB that match these criteria.";
			}
		}

		public function select_author_id($author_name){
			$this->author_name = $author_name;
			$sql = "SELECT id FROM authors WHERE author_name = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->author_name]);
			$result = $stmt->fetch();
			if(!empty($result)){
				return $result['id'];
			}
			else{
				echo "There's no data in the DB that match these criteria.";
			}

		}

		public function select_category_id($category){
			$this->category = $category;

			$sql = "SELECT id FROM categories WHERE catg_name = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->category]);
			$result = $stmt->fetch();
			if(!empty($result)){
				return $result['id'];
			}
			else{
				echo "There's no data in the DB that match these criteria.";
			}
		}

		public function download_book_cover($book, $book_id, $author){
			//Download the book cover into the file "bookcovers" where the user add a new book read.
		shell_exec('python3 /var/www/html/booked/python/get_book_url_img.py "'.$book.'" "'.$author.'" "'.$book_id.'" ');

		}

		//FUNCTIONS USED IN THE index.php page!

		public function display_years_homepage($user_id){
			$this->user_id = $user_id;

			$sql = "SELECT DISTINCT year_number FROM add_book  
				JOIN users ON user_id = users.id
				JOIN books ON book_id = books.id
				JOIN authors ON author_id = authors.id
				JOIN categories ON catg_id = categories.id
				JOIN month_finished ON month_id = month_finished.id
				JOIN year_finished ON year_id = year_finished.id WHERE user_id = ? ORDER BY year_number;"; //This will display only the years where the user added books into his/her list!
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id]);
			$result = $stmt->fetchAll();
			echo "<div class='years'>";
			foreach($result as $data){
				echo "<a id='year-unit' href='initial_page.php?year=".$data['year_number']."' onclick='giveId()'>".$data['year_number']."</a>";
			}
			echo "</div>";

		}

		public function display_years_input($user_id){
			$this->user_id = $user_id;

			$sql = "SELECT DISTINCT year_number FROM add_book  
				JOIN users ON user_id = users.id
				JOIN books ON book_id = books.id
				JOIN authors ON author_id = authors.id
				JOIN categories ON catg_id = categories.id
				JOIN month_finished ON month_id = month_finished.id
				JOIN year_finished ON year_id = year_finished.id WHERE user_id = ? ORDER BY year_number;"; //This will display only the years where the user added books into his/her list!
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id]);
			$result = $stmt->fetchAll();
			echo "<div class='years'>";
			foreach($result as $data){
				echo "<a id='year-unit' href='initial_page.php?year=".$data['year_number']."' onclick='giveId()'>".$data['year_number']."</a>";
			}
			echo "</div>";

		}

		public function get_smallest_year(){
			$sql = "SELECT MIN(year_number) AS smallest_year FROM year_finished";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetch();
			return $result['smallest_year'];
		}

		public function display_books_year($user_id, $year){
			$this->user_id = $user_id;
			$this->year = $year;

			$sql = "SELECT add_book.id, book_title, book_id, author_name, catg_name, month_name, year_number, task_date, classification FROM add_book JOIN users ON user_id = users.id JOIN books ON book_id = books.id JOIN authors ON author_id = authors.id JOIN categories ON catg_id = categories.id JOIN month_finished ON month_id = month_finished.id JOIN year_finished ON year_id = year_finished.id WHERE user_id = ? AND year_number = ? ORDER BY month_id DESC;"; //This is how you do it bro. You now order the books by the month the user read the book! And now is in descending order, meaning that the first books are the ones first chronologically.
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id, $this->year]);
			$result = $stmt->fetchAll();
			foreach($result as $data){ ?>

			<div class="box">
			<?php $location = 'bookcovers/bookcover'.$data['book_id'].'.jpg'; ?>
			
			<?php 
			if(file_exists($location)==True){
				echo '<img class="cover" src="'.$location.'">';
			}
			else {
				
				echo '<img class="cover" src="bookcovers/default_bookcover.jpg">';
			}
			?>
			<div class="book_info">
				<p class="title"><?php echo $data['book_title'] ?></p>
				<p class="author">Author: </p>
				<p class="authors_name"><?php echo $data['author_name'] ?></p>
				<p class="category">Category:</p>
				<p class="category_name"><?php echo $data['catg_name'] ?></p>
				<p class="month">Month finished:</p>
				<p class="month_name"><?php echo $data['month_name'] ?></p>
				<p class="date">Date added:</p>
				<p class="date_info"><?php echo $data['task_date'] ?></p>
			</div>
			<script type="text/javascript">
				function confirm_alert(node) {
				    return confirm("If you really want to delete this book from your list, press OK.");
				} //This will result in a pop up message when the user click the delete button!
			</script>
			<?php 

			echo  '<a href="initial_page.php?edit=true&add_book='.$data['id'].'&book_id='.$data['book_id'].'" id="button_books_box">Edit book\'s information</a>';//This is the edit button where the user can adit the information on the books.
			echo  '
			<a href="initial_page.php?delete='.$data['id'].'" class = "delete_book_button"><img src="images/trash.png" width="30px" onclick="return confirm_alert(this);"></a>';//This is the delete button where the user can delete books added to the website.


			?>

			</div>
			<?php  
			}

		}

		public function display_books_month($user_id,$month, $year){
			$this->user_id = $user_id;
			$this->year = $year;
			$this->month = $month;

			$sql = "SELECT add_book.id, book_title, book_id, author_name, catg_name, month_name, year_number, task_date, classification FROM add_book JOIN users ON user_id = users.id JOIN books ON book_id = books.id JOIN authors ON author_id = authors.id JOIN categories ON catg_id = categories.id JOIN month_finished ON month_id = month_finished.id JOIN year_finished ON year_id = year_finished.id WHERE user_id = ? AND year_number = ? AND month_name = ? ORDER BY id DESC"; //When I use ORDER BY id DESC that means it will display always the last row added!
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id, $this->year, $this->month]);
			$result = $stmt->fetchAll();

			foreach($result as $data){ ?>

			<div class="box">
			<?php $location = 'bookcovers/bookcover'.$data['book_id'].'.jpg'; ?>
			
			<?php 
			if(file_exists($location)==True){
				echo '<img class="cover" src="'.$location.'">';
			}
			else {
				
				echo '<img class="cover" src="bookcovers/default_bookcover.jpg">';
			}
			?>
			<div class="book_info">
				<p class="title"><?php echo $data['book_title'] ?></p>
				<p class="author">Author: </p>
				<p class="authors_name"><?php echo $data['author_name'] ?></p>
				<p class="category">Category:</p>
				<p class="category_name"><?php echo $data['catg_name'] ?></p>
				<p class="month">Month finished:</p>
				<p class="month_name"><?php echo $data['month_name'] ?></p>
				<p class="date">Date added:</p>
				<p class="date_info"><?php echo $data['task_date'] ?></p>
			</div>
			<script type="text/javascript">
				function confirm_alert(node) {
				    return confirm("If you really want to delete this book from your list, press OK.");
				} //This will result in a pop up message when the user click the delete button!
			</script>
			<?php 

			echo  '<a href="initial_page.php?edit=true&add_book='.$data['id'].'&book_id='.$data['book_id'].'" id="button_books_box">Edit book\'s information</a>';//This is the edit button where the user can edit the information on the books.
			echo  '
			<a href="initial_page.php?delete='.$data['id'].'" class = "delete_book_button"><img src="images/trash.png" width="30px" onclick="return confirm_alert(this);"></a>';//This is the delete button where the user can delete books added to the website.


			?>

			</div>
			<?php  
			}
		}

		public function books_read_month($user_id, $year, $month){
			$this->user_id = $user_id;
			$this->year = $year;
			$this->month = $month;

			$sql = "SELECT COUNT(book_title) AS books_read, month_name, year_number FROM add_book 
			JOIN users ON user_id = users.id 
			JOIN books ON book_id = books.id 
			JOIN authors ON author_id = authors.id 
			JOIN categories ON catg_id = categories.id 
			JOIN month_finished ON month_id = month_finished.id 
			JOIN year_finished ON year_id = year_finished.id 
			WHERE user_id = ? AND year_number = ? AND month_name = ? GROUP BY month_name";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id, $this->year, $this->month]);
			$result = $stmt->fetch();
			if(!empty($result)){
				return $result['books_read'];
			}
			else{
				return '0';
			}

		}

		public function books_read_year($user_id, $year){
			$this->user_id = $user_id;
			$this->year = $year;

			$sql = "SELECT COUNT(book_title) AS books_read FROM add_book 
			JOIN users ON user_id = users.id 
			JOIN books ON book_id = books.id 
			JOIN authors ON author_id = authors.id 
			JOIN categories ON catg_id = categories.id 
			JOIN month_finished ON month_id = month_finished.id 
			JOIN year_finished ON year_id = year_finished.id 
			WHERE user_id = ? AND year_number = ? GROUP BY year_number";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id, $this->year]);
			$result = $stmt->fetch();
			if(!empty($result)){
				return $result['books_read'];
			}
			else{
				return '0';
			}


		}

		public function search($user_id, $search_term){
			$this->user_id = $user_id;

			$sql = "SELECT add_book.id, book_title, book_id, author_name, catg_name, month_name, year_number, task_date FROM add_book 
			JOIN users ON user_id = users.id 
			JOIN books ON book_id = books.id 
			JOIN authors ON author_id = authors.id 
			JOIN categories ON catg_id = categories.id 
			JOIN month_finished ON month_id = month_finished.id 
			JOIN year_finished ON year_id = year_finished.id 
			WHERE user_id = ? HAVING book_title LIKE ? OR author_name LIKE ? 
			OR catg_name LIKE ? ORDER BY year_id DESC";

			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id, $search_term, $search_term, $search_term]);
			$result = $stmt->fetchAll();

			foreach($result as $data){ ?>

			<div class="box">
			<?php $location = 'bookcovers/bookcover'.$data['book_id'].'.jpg'; ?>
			
			<?php 
			if(file_exists($location)==True){
				echo '<img class="cover" src="'.$location.'">';
			}
			else {
				
				echo '<img class="cover" src="bookcovers/default_bookcover.jpg">';
			}
			?>
			<div class="book_info">
				<p class="title"><?php echo $data['book_title'] ?></p>
				<p class="author">Author: </p>
				<p class="authors_name"><?php echo $data['author_name'] ?></p>
				<p class="category">Category:</p>
				<p class="category_name"><?php echo $data['catg_name'] ?></p>
				<p class="month">Month finished:</p>
				<p class="month_name"><?php echo $data['month_name'] ?></p>
				<p class="date">Date added:</p>
				<p class="date_info"><?php echo $data['task_date'] ?></p>
			</div>
			<script type="text/javascript">
				function confirm_alert(node) {
				    return confirm("If you really want to delete this book from your list, press OK.");
				} //This will result in a pop up message when the user click the delete button!
			</script>
			<?php 

			echo  '<a href="initial_page.php?edit=true&add_book='.$data['id'].'&book_id='.$data['book_id'].'" id="button_books_box">Edit book\'s information</a>';//This is the edit button where the user can adit the information on the books.
			echo  '
			<a href="initial_page.php?delete='.$data['id'].'" class = "delete_book_button"><img src="images/trash.png" width="30px" onclick="return confirm_alert(this);"></a>';//This is the delete button where the user can delete books added to the website.


			?>

			</div>
			<?php  
			}
		}

		public function display_edit_book($user_id, $book_id, $add_book_id, $location){
			$this->user_id = $user_id;
			$this->book_id = $book_id;

			$sql = "SELECT add_book.id, book_title, book_id, author_name, catg_name, month_name, year_number, task_date FROM add_book JOIN users ON user_id = users.id JOIN books ON book_id = books.id JOIN authors ON author_id = authors.id JOIN categories ON catg_id = categories.id JOIN month_finished ON month_id = month_finished.id JOIN year_finished ON year_id = year_finished.id WHERE user_id = ? AND add_book.id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$this->user_id, $add_book_id]);
			$result = $stmt->fetchAll();

			foreach($result as $data){
			?> 
			<div class="box_edit">

				<?php
				if(file_exists($location)==True){
					echo '<img class="edit_cover" src="'.$location.'">';
				}
				else {
					
					echo '<img class="edit_cover" src="bookcovers/default_bookcover.jpg">';
				}
				?>
				
				<form class="edit_info" method="POST" action="includes/edit_book.php">
					<p class="title_text">Title: </p>
					<?php echo ' <input class="edit_title_name" type="text" name="book_title" value="'.$data["book_title"].'"><br> '?>
					<p class="author_text">Author: </p>
					<?php echo ' <input class="edit_authors_name" type="text" name="author_name" value="'.$data["author_name"].'"><br>  '?>
					<p class="category_text">Category:</p>
					<?php echo ' <input class="edit_category_name" type="text" name="catg_name" value="'.$data["catg_name"].'"><br>  '?>
					<p class="month_text">Month finished:</p><br>
					<?php 
						$month = new BookEvent();
						echo $month->display_months_edit($add_book_id);?><br>
					<p class="year_text">Year finished:</p>
					<?php echo ' <input class="edit_year_number" type="text" name="year_number" value="'.$data["year_number"].'"><br> '?>
					<?php echo ' <input style="display:none" name="add_book_id" value="'.$add_book_id.'"> ' //In here a created a input that stores the add_book_id. It is then passed to the edit_book.php file to update the values. ?>
					<?php echo ' <input style="display:none" name="book_id" value="'.$this->book_id.'"> ' //In here a created a input that stores the book id. It is then passed to the edit_book.php file to update the values.?>
					<button type="submit" class="save_button_edit">Save changes</button><!--//This is the button that when clicked will lead the user into the update.php file (when all the database interaction will be done) and then back to the initial page.-->
					<?php echo '<a class="delete_cover" href ="initial_page.php?edit=true&add_book='.$add_book_id.'&book_id='.$this->book_id.'&cover=delete" >Delete book cover</a>'; ?>
					<?php echo '<a href ="initial_page.php?edit=true&add_book='.$add_book_id.'&book_id='.$this->book_id.'&addCover=true" ><img id="add_cover" src="images/plus.png"></a>'; ?>
				</form>

			</div>
			<?php
			
			}
		}

		public function delete_book($add_book_id){
			$sql = "SELECT book_id, book_title, author_name, month_name, year_number, user_id FROM add_book JOIN users ON user_id = users.id JOIN books ON book_id = books.id JOIN authors ON author_id = authors.id JOIN categories ON catg_id = categories.id JOIN month_finished ON month_id = month_finished.id JOIN year_finished ON year_id = year_finished.id WHERE add_book.id = ?";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$add_book_id]);
			$result = $stmt->fetch();
			$this->book_title = $result['book_title'];
			$this->book_id = $result['book_id'];
			$this->user_id = $result['user_id'];
			$this->year = $result['year_number'];


			$sql3 = "DELETE FROM add_book WHERE id = ?";
			$stmt3 = $this->connect()->prepare($sql3);
			$stmt3->execute([$add_book_id]);

			$query = "SELECT * FROM add_book WHERE book_id = ?";
			$var = $this->connect()->prepare($query);
			$var->execute([$this->book_id]);
			$res = $var->fetchAll();

			if(count($res)>0){
				
			}
			else{
				$sql2 = "DELETE FROM books WHERE book_title = ?";
				$stmt2 = $this->connect()->prepare($sql2);
				$stmt2->execute([$this->book_title]);

				$file_path = 'bookcovers/bookcover'.$this->book_id.'.jpg';
				
				if(file_exists($file_path)){
					unlink($file_path);
				}
			}

			
			header("Location: initial_page.php?del=success&year=".$this->year);
		}

		public function delete_book_cover($book_id, $add_book_id){
			$this->book_id = $book_id;

			$location = "/var/www/html/booked/bookcovers/bookcover".$this->book_id.".jpg";
			if(file_exists($location)){ //If there's a file with that id, than delete it. If not, nothing happens. This is to prevent the user to click the delete cover button when the book already doesn't have any cover image.
				unlink($location);
				header("Location: initial_page.php?edit=true&add_book=".$add_book_id."&book_id=".$this->book_id);//It will not show anything in the URL after deletes the book cover. It was giving me some trobles and I changed this feature.
			}

		}

		public function download_book_cover_edit($add_book_id){
			$sql = "SELECT book_id, book_title, author_name, month_name, year_number FROM add_book JOIN users ON user_id = users.id JOIN books ON book_id = books.id JOIN authors ON author_id = authors.id JOIN categories ON catg_id = categories.id JOIN month_finished ON month_id = month_finished.id JOIN year_finished ON year_id = year_finished.id WHERE add_book.id = ?";

			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$add_book_id]);
			$result = $stmt->fetch();

			$book_title = $result['book_title'];
			$author_name = $result['author_name'];
			$book_id = $result['book_id'];
			

			shell_exec('python3 /var/www/html/booked/python/get_book_url_img.py "'.$book_title.'" "'.$author_name.'" "'.$book_id.'" ');	
			//I think I finally got it. The problem was because in the download cover function the path of the python script was one folder directory behind the initial page file. But, they are in the same page. 
			

		}

		public function display_months(){
			$sql = "SELECT * FROM month_finished";
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll();

			echo'<select name="month" class="month_nav">';
			foreach($result as $data){

				echo'<option value="'.$data['month_name'].'">'.$data['month_name'].'</option>';
			}
			
			echo '</select>';


		}
		public function display_months_edit($reading_event_id){
			//Getting the month the user read the edited book from the DB;
			$sql = "SELECT * FROM add_book WHERE id = ?"; //Searching for the id.
			$stmt = $this->connect()->prepare($sql);
			$stmt->execute([$reading_event_id]);
			$result = $stmt->fetch();

			$month_id = $result['month_id'];//

			$sql2 = "SELECT * FROM month_finished WHERE id = ?";//Searching for the month name.
			$stmt2 = $this->connect()->prepare($sql2);
			$stmt2->execute([$month_id]);
			$result2 = $stmt2->fetch();
			$month_name = $result2['month_name'];

			//Getting all the months from the DB to be displayed in the edit page
			$sql3= "SELECT * FROM month_finished";
			$stmt3 = $this->connect()->prepare($sql3);
			$stmt3->execute();
			$result3 = $stmt3->fetchAll();

			

			echo'<select name="month" class="month_nav">';
			foreach($result3 as $data){
				if($data['month_name'] == $month_name){
					
					echo'<option selected value="'.$data['month_name'].'">'.$data['month_name'].'</option>';
				}
				else{
					echo'<option value="'.$data['month_name'].'">'.$data['month_name'].'</option>';
				}
				
			}
			
			echo '</select>';


		}



	}
