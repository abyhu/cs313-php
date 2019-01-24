<?php
//start a session 
if(session_id() == '') {
    session_start();
}

if(isset($_SESSION['items'][$_POST["id"]])) {
	unset($_SESSION['items'][$_POST["id"]]);
} 
if($_SESSION['items'].sizeof() == 0)
	unset($_SESSION['items']); 
	  
?>