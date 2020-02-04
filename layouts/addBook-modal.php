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
