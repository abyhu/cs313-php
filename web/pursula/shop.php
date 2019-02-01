<?php 
//start a session 
if(session_id() == '') {
    session_start(); 
}
if(!isset($_SESSION['items'])) {
	$_SESSION['items'] = array(); 
}

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
                    <div class="item">
                        <img src="images/purse6med.jpg" alt="Little Black Pocketbook" class="purse" />
                        <h2>Little Black Pocketbook</h2>
                        <h3>$25.00</h3>
						<?php
							if(isset($_SESSION['items']["6"])) {
								echo '<input type="button" class="inCart" value="In Your Cart" id="6" name="6" onclick="addCart(this)" />';
							} else {
								echo '<input type="button" class="addCart" value="Add To Cart" id="6" name="6" onclick="addCart(this)" />';
							}
						?>
                        <input type="button" class="checkout" value="Checkout" onclick="openCheckout()" />
                    </div>
                    <div class="item">
                        <img src="images/purse2med.jpg" alt="Hollywood Glam Purse" class="purse" />
                        <h2>Hollywood Glam Purse</h2>
                        <h3>$35.00</h3>
						<?php
							if(isset($_SESSION['items']["2"])) {
								echo '<input type="button" class="inCart" value="In Your Cart" id="2" name="2" onclick="addCart(this)" />';
							} else {
								echo '<input type="button" class="addCart" value="Add To Cart" id="2" name="2" onclick="addCart(this)" />';
							}
						?>
                        <input type="button" class="checkout" value="Checkout" onclick="openCheckout()" />
                    </div>
                    <div class="item">
                        <img src="images/purse1med.jpg" alt="Pinch of Punk Purse" class="purse" />
                        <h2>Pinch of Punk Purse</h2>
                        <h3>$45.00</h3>
						<?php
							if(isset($_SESSION['items']["1"])) {
								echo '<input type="button" class="inCart" value="In Your Cart" id="1" name="1" onclick="addCart(this)" />';
							} else {
								echo '<input type="button" class="addCart" value="Add To Cart" id="1" name="1" onclick="addCart(this)" />';
							}
						?>
                        <input type="button" class="checkout" value="Checkout" onclick="openCheckout()" />
                    </div>
                    <div class="item">
                        <img src="images/purse5med.jpg" alt="Cherry on Top Handbag" class="purse" />
                        <h2>Cherry On Top Handbag</h2>
                        <h3>$30.00</h3>
						<?php
							if(isset($_SESSION['items']["5"])) {
								echo '<input type="button" class="inCart" value="In Your Cart" id="5" name="5" onclick="addCart(this)" />';
							} else {
								echo '<input type="button" class="addCart" value="Add To Cart" id="5" name="5" onclick="addCart(this)" />';
							}
						?>
                        <input type="button" class="checkout" value="Checkout" onclick="openCheckout()" />
                    </div>
                    <div class="item">
                        <img src="images/purse8med.jpg" alt="Essential Clutch" class="purse" />
                        <h2>Essential Clutch</h2>
                        <h3>$20.00</h3>
						<?php
							if(isset($_SESSION['items']["8"])) {
								echo '<input type="button" class="inCart" value="In Your Cart" id="8" name="8" onclick="addCart(this)" />';
							} else {
								echo '<input type="button" class="addCart" value="Add To Cart" id="8" name="8" onclick="addCart(this)" />';
							}
						?>
                        <input type="button" class="checkout" value="Checkout" onclick="openCheckout()" />
                    </div>
                    <div class="item">
                        <img src="images/purse0med.jpg" alt="Retro Traveler Purse" class="purse" />
                        <h2>Oh So Retro Traveler Purse</h2>
                        <h3>$50.00</h3>
						<?php
							if(isset($_SESSION['items']["0"])) {
								echo '<input type="button" class="inCart" value="In Your Cart" id="0" name="0" onclick="addCart(this)" />';
							} else {
								echo '<input type="button" class="addCart" value="Add To Cart" id="0" name="0" onclick="addCart(this)" />';
							}
						?>
                        <input type="button" class="checkout" value="Checkout" onclick="openCheckout()" />
                    </div>
                    <div class="item">
                        <img src="images/purse3med.jpg" alt="Bohemian Handcrafted Bag" class="purse" />
                        <h2>Bohemian Handcrafted Bag</h2>
                        <h3>$40.00</h3>
						<?php
							if(isset($_SESSION['items']["3"])) {
								echo '<input type="button" class="inCart" value="In Your Cart" id="3" name="3" onclick="addCart(this)" />';
							} else {
								echo '<input type="button" class="addCart" value="Add To Cart" id="3" name="3" onclick="addCart(this)" />';
							}
						?>
                        <input type="button" class="checkout" value="Checkout" onclick="openCheckout()" />
                    </div>
                    <div class="item">
                        <img src="images/purse4med.jpg" alt="City Commuter Purse" class="purse" />
                        <h2>City Commuter Purse</h2>
                        <h3>$60.00</h3>
						<?php 
							if(isset($_SESSION['items']["4"])) {
								echo '<input type="button" class="inCart" value="In Your Cart" id="4" name="4" onclick="addCart(this)" />';
							} else {
								echo '<input type="button" class="addCart" value="Add To Cart" id="4" name="4" onclick="addCart(this)" />';
							}
						?>
                        <input type="button" class="checkout" value="Checkout" onclick="openCheckout()" />
                    </div>
                    <div class="item">
                        <img src="images/purse7med.jpg" alt="International Traveler Purse" class="purse" />
                        <h2>International Traveler Purse</h2>
                        <h3>$55.00</h3>
						<?php
							if(isset($_SESSION['items']["7"])) {
								echo '<input type="button" class="inCart" value="In Your Cart" id="7" name="7" onclick="addCart(this)" />';
							} else {
								echo '<input type="button" class="addCart" value="Add To Cart" id="7" name="7" onclick="addCart(this)" />';
							}
						?>
                        <input type="button" class="checkout" value="Checkout" onclick="openCheckout()" />
                    </div>
                </div>
            </div>
	
	<!--ADD FUNCTIONS-->
	<script language="JavaScript" src="scripts/shop.js"></script>
	
	
	
	<!--INCLUDE FOOTER-->
	<?php include('modules/footer.php'); ?>
            