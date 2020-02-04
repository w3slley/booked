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
	?>
			<h1>Dados pessoais</h1>
			<p class='info'><b>Name</b>: <?php echo $_SESSION['name'] ?></p>
			<p class='info'><b>Username</b>: <?php echo $_SESSION['user_name'] ?></p>
			<p class='info'><b>E-mail</b>: <?php echo $_SESSION['email'] ?></p>
			</div>

	<?php } ?>
	<?php include 'layouts/footer.php' ?>
	<script src="javascript/profile.js"></script>
</body>
</html>
