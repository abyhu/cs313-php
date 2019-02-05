<?php 

//start a session 
if(session_id() == '') {
    session_start(); 
}
if(!isset($_SESSION['items'])) {
	$_SESSION['items'] = array(); 
	$_SESSION['i'] = 0; 
}

require('scripts/connectToDb.php'); 
	$db = get_db(); 

	$data = $db->prepare("SELECT id, name, description FROM products WHERE description != ''"); 
	$data->execute();

while ($row = $data->fetch(PDO::FETCH_ASSOC)){
	$products[] = $row; 	
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Pursula">
	<title>Pursula</title>
	
	<!--INCLUDE HEAD-->
	<?php include('modules/head.php'); ?>
	
	<!--INCLUDE HEADERNAV-->
	<?php $page = 'index.php'; include('modules/headerNav.php'); ?>

            <div id="index">
                <div id="slider">
					<?php 
                    echo '<input type="button" id="leftArrow" value="<" onclick="arrow(this)" name="'.$_SESSION['i'].'" />'; 					
					echo '<img src="images/purse'.$products[$_SESSION['i'] - 1][id].'large.jpg" alt="Purse '.$products[$_SESSION['i']][id].'" id="sliderImage" />';
					echo '<div id="sliderTextDiv">';
						echo '<h2 id="sliderTitle">'.$products[$_SESSION['i']][name].'</h2>';
						echo '<p id="sliderText">'.$products[$_SESSION['i']][description].'</p>';
						echo '<input type="button" id="buyNow" name="'.$products[$_SESSION['i']][id].'" value="Buy Now" onclick="buyNow(this)" />';
					echo '</div>';
					?>
					
                    <input type="button" id="rightArrow" value=">" onclick="arrow(this)" />
                </div>
            </div>
            
	<!--ADD FUNCTIONS-->
	<script language="JavaScript" src="scripts/slider.js"></script>
	
	<!--INCLUDE FOOTER-->
	<?php include('modules/footer.php'); ?>
  