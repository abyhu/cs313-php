<?php 
//start a session 
if(session_id() == '') {
    session_start();
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
                <form method="post" action="scripts/purchase.php" onreset="resetForm()" onsubmit="return validateAndPost()" name="myForm">
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
									echo $key." ".$val;
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
								$subtotal = 0; 
								if(isset($_SESSION['items'])) {
									foreach ($_SESSION['items'] as $key=>$val) {
									$subtotal += $prices[(int)$key];  
									}
									echo $subtotal;
								} else {
									echo $subtotal;
								}							
							?>
							</span>
                            <input type="hidden" name="itemsSubtotal" />
                        </p>
                        <p>Shipping total
                            <span id="shippingCost">$0.00</span>
                            <input type="hidden" name="shippingCost" />
                        </p>
                        <p>Tax Estimate
                            <span id="taxCost">$0.00</span>
                            <input type="hidden" name="taxCost" />
                        </p>
                        <p>Order Total
                            <span id="totalCost">$0.00</span>
                            <input type="hidden" name="totalCost" />
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
	
	<!--INCLUDE FOOTER-->
	<?php include('modules/footer.php'); ?>