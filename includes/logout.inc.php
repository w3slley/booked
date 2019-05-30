<?php 

	if(!isset($_POST['submit'])) {
		header("Location: ../initial_page.php");
	}

	else {
		session_start();
		session_unset();
		session_destroy();
		header("Location: ../index.php?logout=success");
		exit();

	}


