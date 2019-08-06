<?php
session_start();
if(isset($_SESSION['id'])){
    header('Location: dashboard.php');
}
else{ ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display|Satisfy|Acme|Poiret+One" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    

    <div class="login">
        <form method="POST" action="includes/login.inc.php">
            <div class="logo">
                
                <p><img src="images/books.svg" >Booked</p>
            </div>
            <p>Email or Username:</p><br>         
            <input autofocus type="name" name="email"><br>
            <p>Password:</p><br>
            <input type="password" name="password"><br>
            <button type="submit" name="submit">Login</button>
        </form> 
    </div>
</body>
</html>

<?php
}
