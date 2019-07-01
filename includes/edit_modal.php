<?php
include "../classes/BookEvent.php";
session_start();

$id = $_SESSION['id'];
$add_book_id = $_POST['add_book_id'];

$data = new BookEvent();
$data->display_edit_book($id, $add_book_id);

