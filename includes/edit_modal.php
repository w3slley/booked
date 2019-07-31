<?php
include "../classes/BookEvent.php";
session_start();

$id = $_SESSION['id'];
$hash_id = $_POST['hash_id'];

$data = new BookEvent();
$data->display_edit_book($id, $hash_id);

