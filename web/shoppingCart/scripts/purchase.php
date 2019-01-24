<?php
//start a session 
if(session_id() == '') {
    session_start();
}

$fName = $lName = $street = $city = $state = $zip = $phone = $subtotal = $shipping = $tax = $total = $radio = $expiration = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$fName = $_POST["fName"];
	$lName = $_POST["lName"];
	$street = $_POST["street"];
	$city = $_POST["city"];
	$state = $_POST["state"];
	$zip = $_POST["zip"];
	$phone = $_POST["phone"];
	$subtotal = $_POST["subtotal"];
	$shipping = $_POST["shipping"];
	$tax = $_POST["tax"];
	$total = $_POST["total"];
	$radio = $_POST["radio"];
	$expiration = $_POST["expirationDate"];
}

$_SESSION["fName"] = $fName;
$_SESSION["lName"] = $lName;
$_SESSION["street"] = $street;
$_SESSION["city"] = $city;
$_SESSION["state"] = $state;
$_SESSION["zip"] = $zip;
$_SESSION["phone"] = $phone;
$_SESSION["subtotal"] = $subtotal;
$_SESSION["shipping"] = $shipping;
$_SESSION["tax"] = $tax;
$_SESSION["total"] = $total;
$_SESSION["radio"] = $radio;
$_SESSION["expiration"] = $expiration;

print '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pursula</title>
    <!--INCLUDE HEAD-->
	<?php include("modules/head.php"); ?>
	
	<!--INCLUDE HEADERNAV-->
	<?php $page = "shop.php"; include("modules/headerNav.php"); ?>'

print " <h3 class=\"review\">Shipping Information:</h3>
        <p>$fName $lName</p>
        <p>$street</p>
        <p>$city, $state $zip</p>
        <p>$phone</p>

        <h3 class=\"review\">Order Summary:</h3>
        <p>Your purchase includes: $itemsOrdered</p>
        <p>Subtotal: $subtotal</p>
        <p>Shipping Cost: $shipping</p>
        <p>Tax Charges: $tax</p>
        <p>Total Purchase: $total</p>

        <h3 class=\"review\">Payment Information:</h3>
        <p>Credit Card Type: $radio </p>
        <p>Card Expiration Date: $expiration</p>";

print ' <p>
            <input type="submit" id="clear" name="clearForm" value="Cancel Order" onsubmit="return confirmAndPost(this)" />
            <input type="submit" id="submitButton" name="submitForm" value="Submit Order" onsubmit="return confirmAndPost(this)" />
        </p>
    
	<!--INCLUDE FOOTER-->
	<?php include("modules/footer.php");?>';

?>
