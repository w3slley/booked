<!DOCTYPE html>
<html>
<head>
	<title>test layout books
	</title>
	<style type="text/css">
		.box{
			margin: 0 ;
			width: 30%;
			padding: 0 0 200px 0;
			background-color: gray;
			position: relative;
			border-radius: 10px;
			width: 70%;
		}
		img .cover {
			width: 120px;
			position: absolute;
			left: 2%;
			top: 5%;
		}

		.title {
			font-size: 50px;
			text-align: center;
			position: absolute;
			left: 17%;
			bottom: 40%;
		}

		.author {
			font-size: 20px;
			position: absolute;
			top: 30%;
			left: 17%;
		}

		.authors_name {
			font-size: 20px;
			position: absolute;
			top: 30%;
			left: 25%;
		}
		.category {
			font-size: 20px;
			position: absolute;
			top: 45%;
			left: 17%;
		}
		.category_name {
			font-size: 20px;
			position: absolute;
			top: 45%;
			left: 26%;
		}
		.month {
			font-size: 20px;
			position: absolute;
			top: 60%;
			left: 17%;
		}
		.month_name {
			font-size: 20px;
			position: absolute;
			top: 60%;
			left: 32%;
		}

		.date {
			font-size: 20px;
			position: absolute;
			top: 75%;
			left: 17%;
		}
		.date_info {
			font-size: 20px;
			position: absolute;
			top: 75%;
			left: 28%;
		}

	</style>
</head>
<body>

<?php 
	include "includes/dbh.inc.php";
	$book = 'A caixa de pássaros';
 ?>
<div class="box">
	<?php /*$img = shell_exec('python get_book_url_img.py "'.$book.'"  '); // This is how you run a python script on PHP!! The string inside '' is the book the python algorithm will search online to get its cover!
	echo "<img src='".$img."'>"	//This approuch is too low to load all the images. I will download the images from the goodreads site and store in a folder and then link them to the books! I'll do this tomorrow.*/	?>
	<img class="cover" src="images/book.jpg">
	<p class="title">Book title</p>
	<p class="author">Author: </p>
	<p class="authors_name">Author's name</p>
	<p class="category">Category:</p>
	<p class="category_name">category name</p>
	<p class="month">Month finished:</p>
	<p class="month_name">January</p>
	<p class="date">Date added:</p>
	<p class="date_info">date</p>





</div>

<?php 

	/*$url= 'https://images.gr-assets.com/books/1472119680l/27833670.jpg';
	$img_name = basename($url); //the basename function gets the name of the file - in this case, the image name and extention.
	$img_ext_init_pos = strpos($img_name, '.');
	$img_ext = substr($img_name, $img_ext_init_pos+1, 5);//This gets the image extention!
	$location = 'images/bookcover123id.'.$img_ext;

	file_put_contents($location, file_get_contents($url));*/
	//This is how you download a image file with the URL to your computer using PHP!!*/

	/*$book = 'The origin of species';
	$author = 'Charles Darwin';
	$a = shell_exec('python ../get_book_url_img.py "'.$book.$author.'"  ');
	echo $a;*/


	//This is the other way!

	$url= 'https://images.gr-assets.com/books/1388620656l/55030.jpg';
	$ch = curl_init($url);
	$img_name = basename($url); //the basename function gets the name of the file - in this case, the image name and extention.
	$img_ext_init_pos = strpos($img_name, '.');
	$img_ext = substr($img_name, $img_ext_init_pos+1, 5);//This gets the image extention!
	$location = "images/bookcoverid142.".$img_ext;
		
	$fp = fopen($location, 'wb');
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);
	curl_close($ch);
	fclose($fp);
		
	
	




 ?>



</body>
</html>