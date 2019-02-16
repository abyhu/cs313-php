<?php
function preventHacks($data) {
	$data = trim($data); 
	$data = stripslashes($data); 
	$data = htmlspecialchars($data); 
	return $data; 
}

if(isset($_POST['login'])){ //check if form was submitted
  	$username = preventHacks($_POST["username"]); //get input text
	$password = preventHacks($_POST["password"]); 
	
	echo $username; 
	echo $password; 
	
	//query database to make sure user exists
	require 'scripts/connectToDb.php';
	$db = get_db(); 
	
	//$stmt = $pdo->prepare('SELECT user_id FROM authentication WHERE username = ? and password = ?'); 
	//$stmt->execute(array($username, $password));
	//$userId = $stmt->fetch(); 
	
	//echo $userId; 
	
	
	
		
	
	//if user exists set session variable for the user 	
  	//if ()
	
	//redirect to the welcome page
	//header('Location: welcome.php');
	//die(); 
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
	  	Username: <input type="text" name="username"><br /><br />
		Password: <input type="text" name="password"><br /><br />
	  	<input type="submit" name="login" value="Login">
	  </form>
	  <p>If you do not have an account, create one <a href='signup.php'>here</a>.</p>
  
  </body>
</html>