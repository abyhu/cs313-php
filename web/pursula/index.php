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

	$data = $db->prepare("SELECT id, name, description FROM products WHERE description != ''"); 
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
                    echo '<input type="button" id="leftArrow" value="<" onclick="arrow(this)" name="'.($_SESSION['i'] + 1).'" />'; 					
					echo '<img src="images/purse'.($_SESSION['i']).'large.jpg" alt="Purse '.$products[$_SESSION['i']][id].'" id="sliderImage" />';
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
				if (i == 0) {
					i = productNum - 1;
				} else {
					i--;
				}
			} else {
				if (i == (productNum - 1)) {
					i = 0;
				} else {
					i++;
				}
			}
			//change the slider items to the newly selected item
			document.getElementById("leftArrow").setAttribute("name", i);
			document.getElementById("sliderImage").setAttribute("src", "images/purse" + i + "large.jpg");
			document.getElementById("sliderImage").setAttribute("alt", "Purse " + i);
			document.getElementById("sliderTitle").innerHTML = "<?php echo $products[$_SESSION['i']][name] ?>";
			document.getElementById("sliderText").innerHTML = "<?php echo $products[$_SESSION['i']][description] ?>";
			document.getElementById("buyNow").setAttribute("name", i);
			
			
			i = {i: i};
			
			$.post('scripts/slider.php', i);
			
			window.open('index.php','_self',false);
		}
	</script>
	
	<!--INCLUDE FOOTER-->
	<?php include('modules/footer.php'); ?>
  