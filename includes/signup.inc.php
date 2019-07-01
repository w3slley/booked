<?php

	include "../classes/User.php";
	session_start();

	if(! ($_POST['password2'] == $_POST['password'])){
		header("Location: ../index.php?password=notEqual");
	}
	else{

		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


		if ( empty($name) || empty($email) || empty($password)) {
			header("Location: ../index.php?signup=empty");
		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("Location: ../index.php?signup=invalidEmail");
		}
		else {
			//Inserting the data in the database.
			$data = new User();
			$data->signup($name, $email, $hashedPassword);

			header("Location: ../login.php?signup=success");
			
		}

	}


		