<?php 

//start a session 
if(session_id() == '') {
    session_start(); 
}

if(!isset($_SESSION['items'])) {
	$_SESSION['items'] = array();
}

if(!isset($_SESSION['i'])) {
	$_SESSION['i'] = 0; 
}

require('scripts/connectToDb.php'); 
	$db = get_db(); 

	$data = $db->prepare("SELECT id, name, description FROM products WHERE description != '' AND quantity > 0 ORDER BY id"); 
	$data->execute();

while ($row = $data->fetch(PDO::FETCH_ASSOC)){
	$products[] = $row;
}

$productNum = count($products);

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
                    echo '<input type="button" id="leftArrow" value="<" onclick="arrow(this)" name="'.$products[$_SESSION['i']][id].'" />'; 					
					echo '<img src="images/purse'.$products[$_SESSION['i']][id].'large.jpg" alt="Purse '.$products[$_SESSION['i']][id].'" id="sliderImage" />';
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
	<script>
		/* ___________Slider Left/Right Arrows____________ */
		function arrow(arrow, products) {
			//establish variables to be used in the slider
			var i = (document.getElementById("leftArrow").name);
			var productNum = <?php echo $productNum ?>;

			//the next item depends on which slider button was selected
			if (arrow.value == "<") {
				if (i == 1) {
					i = productNum;
				} else {
					i--;
				}
			} else {
				if (i == (productNum)) {
					i = 1;
				} else {
					i++;
				}
			}
			
			var iObjectToPHP = {i: i - 1};
			
			$.post('scripts/slider.php', iObjectToPHP);
			
			window.open('index.php','_self',false);
		}
		
		function buyNow(itemId) {
			var itemId = {id: itemId.name};
			
			$.post('scripts/addToCart.php', itemId);
			
			window.open('shop.php','_self',false);
		}
	</script>
	
	<!--INCLUDE FOOTER-->
	<?php include('modules/footer.php'); ?>
  