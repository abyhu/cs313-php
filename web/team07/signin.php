<?php
if(isset($_POST['login'])){ //check if form was submitted
  	$username = $_POST['username']; //get input text
	$password = $_POST['password']; 
	
	//query database to make sure user exists
	require 'scripts/connectToDb.php';
	$db = get_db(); 
	//echo "connected to database"; 
	
		
	
	//if user exists set session variable for the user 	
  	//if ()
	
	//redirect to the welcome page
	header('Location: welcome.php');
	die(); 
}    
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Sign-In Page</title>
  </head>
  <body>
	  <p>Please sign in: </p>
	  <form method="post" action="">
	  	Username: <input type="text" name="username"><br />
		Password: <input type="text" name="password"><br />
	  	<input type="submit" name="login" value="Login">
	  </form>
	  
	  <p>If you do not have an account, create one <a href='signup.php'>here</a>.</p>
  
  </body>
</html>