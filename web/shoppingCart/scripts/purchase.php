<?php
session_start();

$fName = $_POST["fName"];
$lName = $_POST["lName"];
$street = $_POST["street"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];
$phone = $_POST["phone"];
$itemsOrdered = $_POST["itemsOrdered"];
$itemsSubtotal = $_POST["itemsSubtotal"];
$shippingCost = $_POST["shippingCost"];
$taxCost = $_POST["taxCost"];
$totalCost = $_POST["totalCost"];
$radio = $_POST["radio"];
$expiration = $_POST["expirationDate"];

$_SESSION["fName"] = $fName;
$_SESSION["lName"] = $lName;
$_SESSION["street"] = $street;
$_SESSION["city"] = $city;
$_SESSION["state"] = $state;
$_SESSION["zip"] = $zip;
$_SESSION["phone"] = $phone;
$_SESSION["itemsOrdered"] = $itemsOrdered;
$_SESSION["itemsSubtotal"] = $itemsSubtotal;
$_SESSION["shippingCost"] = $shippingCost;
$_SESSION["taxCost"] = $taxCost;
$_SESSION["totalCost"] = $totalCost;
$_SESSION["radio"] = $radio;
$_SESSION["expiration"] = $expiration;

print '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pursula</title>
    <meta name="description" content="Pursula">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../styles/main.css" />
    <script src="navigation.js"></script>
</head>

<body>
    <div>
        <header>
            <h1>Pursula</h1>
            <a href=""><img src="../images/pursulaLogo.jpg" alt="Pursula Logo" id="logo" /></a>
        </header>
        <main id="purchase">
        <form method="post" action="confirmation.php" name="myForm" id="newForm">
        <h2 id="review">Review Your Order</h2>
        <input type="hidden" name="fName" value ="$fName" />
        <input type="hidden" name="lName" value ="$lName" />
        <input type="hidden" name="street" value ="$street" />
        <input type="hidden" name="city" value ="$city" />
        <input type="hidden" name="state" value ="$state" />
        <input type="hidden" name="zip" value ="$zip" />
        <input type="hidden" name="phone" value ="$phone" />
        <input type="hidden" name="itemsOrdered" value ="$itemsOrdered" />
        <input type="hidden" name="itemsSubtotal" value ="$itemsOrdered" />
        <input type="hidden" name="phone" value ="$phone" />';

print " <h3 class=\"review\">Shipping Information:</h3>
        <p>$fName $lName</p>
        <p>$street</p>
        <p>$city, $state $zip</p>
        <p>$phone</p>

        <h3 class=\"review\">Order Summary:</h3>
        <p>Your purchase includes: $itemsOrdered</p>
        <p>Subtotal: $itemsSubtotal</p>
        <p>Shipping Cost: $shippingCost</p>
        <p>Tax Charges: $taxCost</p>
        <p>Total Purchase: $totalCost</p>

        <h3 class=\"review\">Payment Information:</h3>
        <p>Credit Card Type: $radio </p>
        <p>Card Expiration Date: $expiration</p>

";

print ' <p>
            <input type="submit" id="clear" name="clearForm" value="Cancel Order" onsubmit="return confirmAndPost(this)" />
            <input type="submit" id="submitButton" name="submitForm" value="Submit Order" onsubmit="return confirmAndPost(this)" />
        </p>
    </form>
    </main>
<footer>
    <p>&copy; 2018 | Abrial Marroquin | Tremonton, Utah | <a href="http://www.byui.edu/online" class>BYU Idaho Online Learning</a></p>
</footer>
</div>
</body>
</html>';

?>
