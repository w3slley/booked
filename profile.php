<?php  
	session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
</head>
<body>

	<?php  
		if(isset($_SESSION['first_name'])){
			echo "<h1>Dados pessoais</h1>";
			echo "<p class='info'>Name: </p>".$_SESSION['first_name']." ".$_SESSION['last_name']."<br>";
			echo "<p class='info'>Username: </p>".$_SESSION['user_name']."<br>";
			echo "<p class='info'>E-mail: </p>".$_SESSION['email']."<br>";
			echo "<p class='info'>Birth date: </p>".$_SESSION['birth_date']."<br>";
			echo "</div>";
		}		
	?>

</body>
</html>