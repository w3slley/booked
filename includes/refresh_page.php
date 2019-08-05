<?php
include '../classes/BookEvent.php';
session_start();
$id = $_SESSION['id'];
$year = $_POST['year'];

$data = new BookEvent();
$data->refresh_books_year($id, $year);
