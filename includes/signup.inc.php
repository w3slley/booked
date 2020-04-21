<?php
	include_once "../classes/User.php";
	session_start();
	$user = new User;

	if(!($_POST['password2'] == $_POST['password'])){
		header("Location: ../index.php?password=notEqual");
	}
	else{
		$name = $_POST['name'];
		$user_name = $_POST['user-name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


		if ( empty($name) || empty($user_name)|| empty($email) || empty($password)) {
			header("Location: ../index.php?signup=empty");
		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("Location: ../index.php?signup=invalidEmail");
		}
		else {
			//Inserting the data in the database.
			$user->signup($name, $user_name, $email, $hashedPassword);

			header("Location: ../login.php?signup=success");
		}
	}
