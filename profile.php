<?php
	session_start();
	include 'classes/BookEvent.php';
	$book = new BookEvent();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	<?php include 'layouts/links.php'; ?>
</head>
<body>
	<?php include 'layouts/addBook-modal.php' ?>
	<?php include 'layouts/nav.php' ?>

	<?php
		if(isset($_SESSION['id'])){
			echo "<h1>Dados pessoais</h1>";
			echo "<p class='info'>Name: ".$_SESSION['name']."</p>";
			echo "<p class='info'>Username: ".$_SESSION['user_name']."</p>";
			echo "<p class='info'>E-mail: ".$_SESSION['email']."</p>";
			echo "</div>";
		}
	?>

	<?php include 'layouts/footer.php' ?>
	<script src="javascript/profile.js"></script>
</body>
</html>
