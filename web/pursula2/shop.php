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

	$data = $db->prepare("SELECT id, name, img_url, price FROM products WHERE quantity > 0 ORDER BY id"); 
	$data->execute(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Pursula">
	<title>Pursula Shop</title>
	
	<!--INCLUDE HEAD-->
	<?php include('modules/head.php'); ?>
	
	<!--INCLUDE HEADERNAV-->
	<?php $page = 'shop.php'; include('modules/headerNav.php'); ?>
  
		<div id="shop">
                <div id="shopGallery">
					
					<?php 
					while ($row = $data->fetch(PDO::FETCH_ASSOC)){
						echo '<div class="item">';
						echo '<img src="'.$row[img_url].'" alt="'.$row[name].'" class="purse" />';
						echo '<h2>'.$row[name].'</h2>';
						echo '<h3>$'.$row[price].'.00</h3>';
						if(isset($_SESSION['items'][$row[id]])) {
								echo '<input type="button" class="inCart" value="In Your Cart" id='.$row[id].'name="'.$row[id].'" onclick="addCart(this)" />';
							} else {
								echo '<input type="button" class="addCart" value="Add To Cart" id="'.$row[id].'" name="'.$row[id].'" onclick="addCart(this)" />';
							}
                        	echo '<input type="button" class="checkout" value="Checkout" onclick="openCheckout()" />';
                    	echo '</div>';
           	 		} ?>
                </div>
            </div>
	
	<!--ADD FUNCTIONS-->
	<script language="JavaScript" src="scripts/shop.js"></script>	
	
	<!--INCLUDE FOOTER-->
	<?php include('modules/footer.php'); ?>
            