<?php

	include "../classes/User.php";
	session_start();

	if(! ($_POST['password2'] == $_POST['password'])){
		header("Location: ../index.php?password=notEqual");
	}
	else{

		$first = $_POST['first'];
		$last =  $_POST['last'];
		$user_name = $_POST['user_name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


		if (empty($first) || empty($last) || empty($user_name) || empty($email) || empty($password)) {
			header("Location: ../index.php?signup=empty");
		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("Location: ../index.php?signup=invalidEmail");
		}
		else {
			//Inserting the data in the database.
			$data = new User();
			$data->signup($user_name, $email, $hashedPassword, $first, $last);

			header("Location: ../index.php?signup=success");
			
		}

	}


		