<?php

session_start();  

if(!isset($_SESSION['username'])) {
    header('Location: signin.php');
	die(); 
} else {
	echo $_SESSION['username'];
}


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Welcome Page</title>
  </head>
  <body>
  
  </body>
</html>