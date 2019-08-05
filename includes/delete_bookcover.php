<?php
include "../classes/BookEvent.php";
//Delete book cover:
if(isset($_POST['book_id'])){
    $book_id = $_POST['book_id'];
    $add_book_id = $_POST['add_book_id'];

    $delete = new BookEvent();
    $delete->delete_book_cover($book_id);

    header("Location: initial_page.php?edit=true&add_book=".$add_book_id."&book_id=".$this->book_id);//It will not show anything in the URL after deletes the book cover. It was giving me some trobles and I changed this feature.
    
}
  