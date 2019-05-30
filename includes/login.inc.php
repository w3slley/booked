<?php

	include "../classes/User.php";

	if(!isset($_POST['submit'])) {
		header("Location: ../initial_page.php");

	}

	else {

		$email = $_POST['email'];
		$password = $_POST['password'];

		$login = new User();
		$data = $login->login($email, $password);
		if($data != False){
			session_start();

			$_SESSION['first_name'] = $data['first_name'];
			$_SESSION['last_name'] = $data['last_name'];
			$_SESSION['user_name'] = $data['user_name'];
			$_SESSION['email'] = $data['email'];
			$_SESSION['id'] = $data['id'];
			$_SESSION['birth_date'] = $data['birth_date'];

			header("Location: ../initial_page.php?home=success");
			
		}
		else{
			header("Location: ../index.php?login=error");
		}
		

	}