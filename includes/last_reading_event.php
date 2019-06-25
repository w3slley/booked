<?php
include '../classes/BookEvent.php';
session_start();
//This is how I will create a feature that tells users how many books they read in the current month!
$month = Date('F'); //This is how you get the full month name (current)
$year = Date('Y'); //This is how you get the full year number (current)
$data = new BookEvent();
$number = $data->books_read_current_month($_SESSION['id'], $month, $year);

echo $number;