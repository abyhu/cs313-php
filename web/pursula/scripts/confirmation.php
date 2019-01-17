<?php
session_start();
$lName = $_SESSION["lName"];
$fName = $_SESSION["fName"];
$itemsOrdered = $_SESSION["itemsOrdered"];

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
            <nav>
                <a href="../index.html" class="nav 0" onclick="activateNavItem(this)">Home</a>
                <a href="../index.html" class="nav 1" onclick="activateNavItem(this)">Shop</a>
                <a href="../index.html" class="nav 2" onclick="activateNavItem(this)">References</a>
                <a href="#" class="nav 3" onclick="activateNavItem(this)">Facebook</a>
                <a href="#" class="nav 4" onclick="activateNavItem(this)">Email</a>
            </nav>
            <main id="purchase">';
if (isset($_POST["clearForm"]))
{
    print "<p id=\"finalMessage\">$fName $lName, your order for $itemsOrdered has been canceled. Pursula wants you to be 100% satisfied with your experience. If you have questions about one of our products, please contact us by phone or email. We will be happy to help you decide which product(s) are right for you.</p>";
}
else if (isset($_POST["submitForm"]))
{
    print "<p id=\"finalMessage\">$fName $lName, your order for $itemsOrdered is complete and will be shipped to you shortly. We appreciate you shopping Pursula. We know you will love your new item(s) as we only sell high quality products. If there is a problem, please contact us. We want you to be 100% satisfied with your order.</p>";
}
else
{
    print "<p id=\"finalMessage\">We apologize, $fName $lName, there was an error processing your order for $itemsOrdered. Please submit a new order through our site, or contact us by phone to place your order.</p>";
}


print ' </form>
    </main>
<footer>
    <p>&copy; 2018 | Abrial Marroquin | Tremonton, Utah | <a href="http://www.byui.edu/online" class>BYU Idaho Online Learning</a></p>
</footer>
</div>
</body>
</html>';
?>
