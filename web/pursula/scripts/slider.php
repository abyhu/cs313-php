<?php
	
	require('scripts/connectToDb.php'); 
	$db = get_db(); 

	$data = $db->prepare("SELECT id, name, img_url, description FROM products WHERE description != ''"); 
	$data->execute(); 

//	while ($row = $data->fetch(PDO::FETCH_ASSOC))
//	{
//		echo 'id: ' . $row['id'];
//  		echo ' name: ' . $row['name'];
//		echo 'img_url: ' . $row['img_url'];
//  		echo 'description: ' . $row['description'];
//  		echo '<br/>';
//		echo '</p>';
//	}

	echo $data[0]['name']; 
	echo $data[0]['description']; 
	
	


?>