<?php
//start a session 
if(session_id() == '') {
    session_start();
}

if(!isset($_SESSION['items'][$_POST["id"]])) {
	$_SESSION['items'][$_POST["id"]] = $_POST["id"]; 
} 
	  
?>