<?php
function preventHacks($data) {
	$data = trim($data); 
	$data = stripslashes($data); 
	$data = htmlspecialchars($data); 
	return $data; 
}

session_start();

if(isset($_POST['username']) && isset($_POST['password'])){ //check if form was submitted
  	$username = preventHacks($_POST['username']); //get input text
	$password = $_POST['password']; 
	
	//query database to make sure user exists
	require("scripts/connectToDb.php");
	$db = get_db(); 
	
	$stmt = $db->prepare('SELECT password FROM authentication 
	WHERE username = ?');
	$result = $stmt->execute(array($username));
 	echo $result;
	
	//if user exists set session variable for the user 	
  	if ($result) {
		$row = $stmt->fetch(); 
		$passwordFromDb = $row['password']; 
		echo $passwordFromDb;
		
		if ($password == $passwordFromDb) {
			//password is the same 
			$_SESSION['username'] = $username;
			
			//redirect to the welcome page
			header('Location: welcome.php');
			die(); 
		} 
	} 
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