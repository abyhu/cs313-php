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

	$data = $db->prepare("SELECT id, name, description FROM products"); 
	$data->execute();

while ($row = $data->fetch(PDO::FETCH_ASSOC)){
	$ids[] = $data['id']; 
	$names[] = $data['name']; 
	$descriptions[] = $data['description']; 	
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
					echo '<img src="images/purse'.$ids[0].'large.jpg" alt="Purse '.$ids[0].'" id="sliderImage" />';
					echo '<div id="sliderTextDiv">';
						echo '<h2 id="sliderTitle">'.$names[0].'</h2>';
						echo '<p id="sliderText">'.$descriptions[0].'</p>';
						echo '<input type="button" id="buyNow" name="'.$ids[0].'" value="Buy Now" onclick="buyNow(this)" />';
					echo '</div>';
					?>
					
                    <input type="button" id="rightArrow" value=">" onclick="arrow(this)" />
                </div>
            </div>
            
	<!--INCLUDE FOOTER-->
	<?php include('modules/footer.php'); ?>
  