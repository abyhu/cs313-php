<?php

//start a session 
if(session_id() == '') {
    session_start();
}

$_SESSION['i'] = $_POST["i"];  

?>