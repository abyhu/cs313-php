<?php

	include('scripts/connectToDb.php'); 

	foreach ($db->query('SELECT id, name, img_url, description FROM products WHERE description != ""') as $row)
	{
  		echo 'id: ' . $row['id'];
  		echo ' name: ' . $row['name'];
  		echo '<br/>';
	}

?>