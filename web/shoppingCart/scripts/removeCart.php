<?php
//start a session 
session_start();

if(isset($_SESSION['items'][$_POST["id"]])) {
	unset($_SESSION['items'][$_POST["id"]]);
} 
	  
?>