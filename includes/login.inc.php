<?php
include "../classes/User.php";
session_start();
$user = new User;

if(!isset($_POST['submit'])) {
	header("Location: ../initial_page.php");

}

$email_username = $_POST['email'];
$password = $_POST['password'];

$data = $user->login($email_username, $password);
if($data){

	$_SESSION['name'] = $data['name'];
	$_SESSION['user_name'] = $data['user_name'];
	$_SESSION['email'] = $data['email'];
	$_SESSION['id'] = $data['id'];
	header("Location: ../dashboard.php");

}
else{
	header("Location: ../login.php?login=error");
}
