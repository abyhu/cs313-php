<?php

	try
	{
  		$dbUrl = getenv('DATABASE_URL');

  		$dbOpts = parse_url($dbUrl);

  		$dbHost = $dbOpts["host"];
		$dbPort = $dbOpts["port"];
		$dbUser = $dbOpts["user"];
		$dbPassword = $dbOpts["pass"];
		$dbName = ltrim($dbOpts["path"],'/');

		$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $ex)
	{
  		echo 'Error!: ' . $ex->getMessage();
  		die();
	}
//	include('scripts/connectToDb.php'); 

	//foreach ($db->query('SELECT id, name, img_url, description FROM products WHERE description != ""') as $row)
	//{
  	//	echo 'id: ' . $row['id'];
  	//	echo ' name: ' . $row['name'];
  	//	echo '<br/>';
	//}

//	$stmt = $db->prepare('SELECT * FROM products WHERE description != ""');
//	$stmt->bindValue(':id', $id, PDO::PARAM_INT);
//	$stmt->bindValue(':name', $name, PDO::PARAM_STR);
//	$stmt->bindValue('img_url', $img_url, PDO::PARAM_STR);
//	$stmt->bindValue('description', $description, PDO::PARAM_STR); 
//	$stmt->execute();
//	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

	

?>