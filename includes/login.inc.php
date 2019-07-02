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

		
			$_SESSION['name'] = $data['name'];
			$_SESSION['email'] = $data['email'];
			$_SESSION['id'] = $data['id'];
			

			header("Location: ../dashboard.php");
			
		}
		else{
			header("Location: ../login.php?login=error");
		}
		

	}