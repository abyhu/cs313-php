<?php
//start a session 
if(session_id() == '') {
    session_start(); 
}

require('scripts/connectToDb.php'); 
	$db = get_db(); 

	$data = $db->prepare("SELECT id, name FROM products ORDER BY id"); 
	$data->execute();

while ($row = $data->fetch(PDO::FETCH_ASSOC)){
	$products[] = $row;
}

$fName = $_SESSION["fName"];
$lName = $_SESSION["lName"];
$street = $_SESSION["street"];
$city = $_SESSION["city"];
$state = $_SESSION["state"];
$zip = $_SESSION["zip"];
$phone = $_SESSION["phone"];
$subtotal = money_format('$%i', $_SESSION["subtotal"]);
$shipping = money_format('$%i', $_SESSION["shipping"]);
$tax = money_format('$%i', $_SESSION["tax"]);
$total = money_format('$%i', $_SESSION["total"]);
$radio = $_SESSION["radio"];
$expiration = $_SESSION["expiration"];

print '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pursula</title>
    <!--INCLUDE HEAD-->'; 

include('modules/head.php');
	
print '<!--INCLUDE HEADERNAV-->';
	
$page = "shop.php"; 
include("modules/headerNav.php");

print " 
		<div class='purchase'>
		<p id='finalMessage'>Thank you for shopping at Pursula. Please print out this page for your receipt. Your items will be arriving soon.</p>
		<h3 class='review'>Shipping Information:</h3>
        <p>$fName $lName</p>
        <p>$street</p>
        <p>$city, $state $zip</p>
        <p>$phone</p>
        <h3 class='review'>Order Summary:</h3>
        <p>Your purchase includes:";
		
foreach ($_SESSION['items'] as $key) {
		echo '<p>'; 
		echo $products[$key - 1][name]."</p>";
}
									
print " <br/>
		<p>Subtotal: $subtotal</p>
        <p>Shipping Cost: $shipping</p>
        <p>Tax Charges: $tax</p>
        <p>Total Purchase: $total</p>
        <h3 class='review'>Payment Information:</h3>
        <p>Credit Card Type: $radio </p>
        <p>Card Expiration Date: $expiration</p>
		</div>
		<!--INCLUDE FOOTER-->";

include('modules/footer.php');

session_destroy(); 
?>
