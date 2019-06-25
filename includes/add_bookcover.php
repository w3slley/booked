<?php
include "../classes/BookEvent.php";

if(isset($_POST['book_id'])){
    $add_book_id = $_POST['add_book_id'];
    
    $addCover = new BookEvent();
    $addCover->download_book_cover_edit($add_book_id);

    

}