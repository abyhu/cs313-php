<?php
	
	require('scripts/connectToDb.php'); 
	$db = get_db(); 

	$data = $db->prepare("SELECT name, description FROM products WHERE description != ''"); 
	$data->execute(); 

	while ($row = $data->fetch(PDO::FETCH_ASSOC))
	{
		$ids[] = $row['id']; 
		$names[] = $row['name']; 
		$descriptions[] = $row['description']; 
		
		print_r($ids);
		print_r($names);
		print_r($descriptions);
	}

	
	


?>