<?php 
//start a session 
if(session_id() == '') {
    session_start(); 
}
if(!isset($_SESSION['items'])) {
	$_SESSION['items'] = array(); 
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
                    <input type="button" id="leftArrow" value="<" onclick="arrow(this)" name="1" />
					
					<?php 
					echo '<img src="images/purse'.($products[1][id] - 1).'large.jpg" alt="Purse '.$products[1][id].'" id="sliderImage" />';
					echo '<div id="sliderTextDiv">';
						echo '<h2 id="sliderTitle">'.$products[1][name].'</h2>';
						echo '<p id="sliderText">'.$products[1][description].'</p>';
						echo '<input type="button" id="buyNow" name="'.$products[1][id].'" value="Buy Now" onclick="buyNow(this)" />';
					echo '</div>';
					?>
					
                    <input type="button" id="rightArrow" value=">" onclick="arrow(this)" />
                </div>
            </div>
            
	<!--ADD FUNCTIONS-->
	<script language="JavaScript" src="scripts/checkout.js"></script>
	
	<!--INCLUDE FOOTER-->
	<?php include('modules/footer.php'); ?>
  