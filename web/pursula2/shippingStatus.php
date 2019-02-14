<?php 

require('scripts/connectToDb.php'); 
$db = get_db(); 

$fName = $lName = $street = $city = $state = $zip = $phone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$fName = preventHacks($_POST["fName"]);
	$lName = preventHacks($_POST["lName"]);
	$street = preventHacks($_POST["street"]);
	$city = preventHacks($_POST["city"]);
	$state = preventHacks($_POST["state"]);
	$zip = preventHacks($_POST["zip"]);
	$phone = preventHacks($_POST["phone"]);
	
	$stmt = $db->prepare('SELECT id FROM customers WHERE last_name = ? AND first_name = ? AND street_address = ? AND city = ? AND state = ? AND zip = ? AND phone = ?');  
	$stmt->execute(array($lName, $fName, $street, $city, $state, $zip, $phone));

	$customerId; 
	while ($row = $stmt->fetch()) {
    	$customerId = reset($row);
		echo $customerId; 
  	}

	
//	$stmt = $db->prepare('SELECT o.shipping_status, p.name, p.img_url FROM customers c INNER JOIN orders o ON c.id = o.customer_id INNER JOIN orders_products op ON o.id = op.order_id INNER JOIN products p ON op.product_id = p.id WHERE c.id = ?'); 
//	$stmt->execute(array($customerId));
//	
//	//$orders[]; 
//	
//	while ($row = $stmt->fetch()) {
//    	$orders = $row;
//  	}	
}

function preventHacks($data) {
	$data = trim($data); 
	$data = stripslashes($data); 
	$data = htmlspecialchars($data); 
	return $data; 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Pursula Shipping Status">
	<title>Pursula Checkout</title>
	
	<!--INCLUDE HEAD-->
	<?php include('modules/head.php'); ?>
	
	<!--INCLUDE HEADERNAV-->
	<?php $page = 'shippingStatus.php'; include('modules/headerNav.php'); ?>

		<div id="references">
                <h2>Check Shipping Status</h2>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" onsubmit="return shippingValidateAndPost()" name="myForm">
                    <div>
                        <h3>Customer Information</h3>
                        <p>First Name:
                            <input type="text" name="fName" class="textInput" onfocus="showHelp(name)" onblur="validateName(name, value)" />
                            <span class="help">Ex. Jane </span>
                        </p>
                        <p>Last Name:
                            <input type="text" name="lName" class="textInput" onfocus="showHelp(name)" onblur="validateName(name, value)" />
                            <span class="help">Ex. Doe. </span>
                        </p>
                        <p>Street Address:
                            <input type="text" name="street" class="textInput" onfocus="showHelp(name)" onblur="validateAddr(name, value)" />
                            <span class="help">Ex. 123 W. State Street </span>
                        </p>
                        <p>City:
                            <input type="text" name="city" class="textInput" onfocus="showHelp(name)" onblur="validateName(name, value)" />
                            <span class="help">Ex. Pittsburg</span>
                        </p>
                        <p>State:
                            <input type="text" name="state" class="textInput" onfocus="showHelp(name)" onblur="validateState(name, value)" />
                            <span class="help">Ex. PA </span>
                        </p>
                        <p>Zip Code:
                            <input type="text" name="zip" class="textInput" onfocus="showHelp(name)" onblur="validateZip(name, value)" />
                            <span class="help">Ex. 32134</span>
                        </p>
                        <p>Phone Number:
                            <input type="text" name="phone" class="textInput" onfocus="showHelp(name)" onblur="validatePhone(name, value)" />
                            <span class="help">Ex. 3015555555</span>
                        </p>
						<p id=message></p>
						<p>
                            <input type="submit" id="submitButton" name="submitForm" value="Submit Order" />
                        </p>
                    </div>
					
              	<?php
					if($_SERVER["REQUEST_METHOD"] == "POST") {
						echo '<div id="orderSummary">';
                    	echo '<h3>Order Status</h3>';
						echo '<p>Your order includes: <span id=itemsOrdered>';
						foreach ($orders as $order) {
							echo '<p>Product Name: '.$order[name].'</p>';
							if ($order[shipping_status]) {
								echo '<p>Shipping Status: Shipped</p>';
							} else {
								echo '<p>Shipping Status: Pending Shipment</p>';
							}
							echo '<img href='.$order[img_url].' alt='.$order[name].' />';	
							echo '</span></p>';
							echo '</div';
						}
					}
				?>
					
                </form>
            </div>
	
	<!--Validate Data Entered into the Form-->
	<script language="JavaScript" src="scripts/form.js"></script>
	
	<!--Form Submission-->
	<script language="JavaScript" src="scripts/checkout.js"></script>
	<script language="PHP" src="scripts/purchase.php"></script>
	
	<!--INCLUDE FOOTER-->
	<?php include('modules/footer.php'); ?>