<?php

if(!isset($_SESSION['items'][$_POST["id"]])) {
	$_SESSION['items'][$_POST["id"]] = $_POST["id"]; 
} 
	  
?>