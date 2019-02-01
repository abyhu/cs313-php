<?php

	include('scripts/connectToDb.php'); 

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