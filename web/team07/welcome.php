<?php
if(!isset($_SESSION['userId'])) {
    header('Location: signin.php');
	die(); 
} 
echo $_SESSION['userId'];

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