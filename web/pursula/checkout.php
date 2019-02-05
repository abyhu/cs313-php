<?php 
//start a session 
if(session_id() == '') {
    session_start();
}

require('scripts/connectToDb.php'); 
	$db = get_db(); 

	$data = $db->prepare("SELECT id, name, description FROM products WHERE description != ''"); 
	$data->execute();

while ($row = $data->fetch(PDO::FETCH_ASSOC)){
	$products[] = $row; 	
}

$fName = $lName = $street = $city = $state = $zip = $phone = $radio = $expiration = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$fName = preventHacks($_POST["fName"]);
	$lName = preventHacks($_POST["lName"]);
	$street = preventHacks($_POST["street"]);
	$city = preventHacks($_POST["city"]);
	$state = preventHacks($_POST["state"]);
	$zip = preventHacks($_POST["zip"]);
	$phone = preventHacks($_POST["phone"]);
	$radio = preventHacks($_POST["radio"]);
	$expiration = preventHacks($_POST["expirationDate"]);
	
	$_SESSION["fName"] = $fName;
	$_SESSION["lName"] = $lName;
	$_SESSION["street"] = $street;
	$_SESSION["city"] = $city;
	$_SESSION["state"] = $state;
	$_SESSION["zip"] = $zip;
	$_SESSION["phone"] = $phone;
	$_SESSION["radio"] = $radio;
	$_SESSION["expiration"] = $expiration;
	
	header("Location: purchase.php"); 	
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
    <meta name="description" content="Pursula">
	<title>Pursula Checkout</title>
	
	<!--INCLUDE HEAD-->
	<?php include('modules/head.php'); ?>
	
	<!--INCLUDE HEADERNAV-->
	<?php $page = 'checkout.php'; include('modules/headerNav.php'); ?>

		<div id="checkout">
                <h2>Checkout</h2>
                <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" onsubmit="return validateAndPost()" name="myForm">
                    <div>
                        <h3>Personal Information</h3>
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
                    </div>
                    <div id="orderSummary">
                        <h3>Order Summary</h3>
                        <p>Your order includes: 
							<span id=itemsOrdered>
								
							<?php 
								if(isset($_SESSION['items'])) {
									foreach ($_SESSION['items'] as $key=>$val) {
									echo '<p>'; 
									echo $products[$key][name];
									echo '<input type="button" class="remove" name="removeButton" value="Remove From Cart" onclick="removeFromCart(';
									echo $key;
									echo ')"/><br/>';
									}
								} else {
									echo '<p id="emptyCartMessage">You do not have any items in your cart. Please select an item to purchase before checking out.</p>';
								}							
							?>
							
							</span>
                            <input type="hidden" name="itemsOrdered" />
                        </p>
                        <p>Items Subtotal
                            <span id="itemsSubtotal">
							
							<?php 
								$prices = array(50, 45, 35, 40, 60, 30, 25, 55, 20);
								$_SESSION["subtotal"] = 0; 
								if(isset($_SESSION['items'])) {
									foreach ($_SESSION['items'] as $key=>$val) {
									$_SESSION["subtotal"] += $prices[(int)$key];  
									}
								} 
								echo money_format('$%i', $_SESSION["subtotal"]);			
							?>
							</span>
                            <input type="hidden" name="itemsSubtotal" value="<?php echo $_SESSION["subtotal"]; ?>" />
                        </p>
                        <p>Shipping total
                            <span id="shippingCost">
								<?php 
								$_SESSION["shipping"] = 0; 
								if(isset($_SESSION['items'])) {
									$_SESSION["shipping"] = 9.99;  
								} 
								echo money_format('$%i', $_SESSION["shipping"]);			
							?>
							</span>
                            <input type="hidden" name="shippingCost" value="<?php echo $_SESSION["shipping"]; ?>" />
                        </p>
                        <p>Tax Estimate
                            <span id="taxCost">
								<?php 
								$_SESSION["tax"] = 0; 
								if(isset($_SESSION['items'])) {
									$_SESSION["tax"] = $_SESSION["subtotal"] * 0.06;  
								} 
								echo money_format('$%i', $_SESSION["tax"]);			
							?>
							</span>
                            <input type="hidden" name="taxCost" value="<?php echo $_SESSION["tax"]; ?>" />
                        </p>
                        <p>Order Total
                            <span id="totalCost">
							<?php 
								$_SESSION["total"] = 0; 
								if(isset($_SESSION['items'])) {
									$_SESSION["total"] = $_SESSION["subtotal"] + $_SESSION["shipping"] + $_SESSION["tax"];   
								} 
								echo money_format('$%i', $_SESSION["total"]);			
							?>
							</span>
                            <input type="hidden" name="totalCost" value="<?php echo $_SESSION["total"]; ?>" />
                        </p>
                    </div>
                    <div>
                        <h3>Payment Information</h3>
                        <p>Credit Card Number:
                            <input type="text" name="creditCard" onfocus="showHelp(name)" onblur="validateCard(name, value)" />
                            <span class="help">Ex. 3434 3434 3434 3434</span>
                        </p>
                        <p>Expiration Date:
                            <input type="text" name="expirationDate" onfocus="showHelp(name)" onblur="validateExpiration(name, value)" />
                            <span class="help">Ex. Jan 2019</span>
                        </p>
                        <p>Please indicate a card type:</p>
                        <p class="radio"><input type="radio" name="radio" value="Visa" /> Visa</p>
                        <p class="radio"><input type="radio" name="radio" value="Mastercard" /> Mastercard</p>
                        <p class="radio"><input type="radio" name="radio" value="American Express" /> American Express</p>
                        <p id=message></p>
                        <p>
                            <input type="button" id="continueShop" name="continueShop" value="Continue Shopping" onclick="continueShopping()"/>
                            <input type="submit" id="submitButton" name="submitForm" value="Submit Order" />
                        </p>
                    </div>
                </form>
            </div>
	
	<!--Validate Data Entered into the Form-->
	<script language="JavaScript" src="scripts/form.js"></script>
	
	<!--Form Submission-->
	<script language="JavaScript" src="scripts/checkout.js"></script>
	<script language="PHP" src="scripts/purchase.php"></script>
	
	<!--INCLUDE FOOTER-->
	<?php include('modules/footer.php'); ?>