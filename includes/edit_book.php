<?php
include "../classes/BookEvent.php";
session_start();

$id = $_SESSION['id'];
$hash_id = $_POST['hash_id'];

$data = new BookEvent();
$data->display_edit_book($id, $hash_id); //This will check if the user actually created the note he or she is requesting to see. If it they are, then it will display the info about the book.

