/* ___________CONTINUE SHOPPING____________ */
	function continueShopping() {  
		window.open('shop.php','_self',false); 
}
	
/* ___________REMOVE FROM CART____________ */
	function removeFromCart(itemKey) { 
		var itemId = {id: itemKey}
		$.post('scripts/removeCart.php', itemId);
		window.open('checkout.php','_self',false); 
}



/* _____Onload add reset/submit functions buttons_____ */
function addFunctions() {
    var reset = document.myForm.reset;
    document.getElementById("clear").onclick = function () {
        document.myForm.reset();
    }
}

/* ___________Checkout Submit and Reset____________ */
function resetForm() {
    //clear value for all input items
    document.myForm.fName.value = "";
    document.myForm.lName.value = "";
    document.myForm.street.value = "";
    document.myForm.city.value = "";
    document.myForm.state.value = "";
    document.myForm.zip.value = "";
    document.myForm.phone.value = "";
    document.myForm.creditCard.value = "";
    document.myForm.expirationDate.value = "";
    document.myForm.radio[0].checked = false;
    document.myForm.radio[1].checked = false;
    document.myForm.radio[2].checked = false;
    document.getElementById("message").innerHTML = "";
    document.getElementById("message").style.display = "none";
    document.title = "Pursula Home";
    document.getElementById("index").style.display = "block";
    document.getElementById("shop").style.display = "none";
    document.getElementById("references").style.display = "none";
    document.getElementById("checkout").style.display = "none";

    //clear all "valid" classes for input items
    var validInput = document.getElementsByClassName("valid");
    for (var i = 0; i < validInput.length; i++) {
        validInput[i].className = ""
    }

    //clear all "inCart" classes for shopping items
    var shopItems = document.getElementsByClassName("inCart");
    for (var i = 0; i < shopItems.length; i++) {
        shopItems[i].className = "addCart";
    }
}


/* ___________Open Checkout____________ */
function openCheckout() {

    //add selected items to an array and pass it to the function that will calculate the total cost including shipping and tax
    var itemsArray = [];
    if (document.getElementsByClassName("inCart").length == 0) {
        document.getElementById("message").innerHTML = "You do not have any items in your cart, please return to the shopping page to select an item before checking out.";
        document.getElementById("message").style.display = "block";
    } else {
        document.getElementById("message").style.display = "none";
        for (var i = 0; i < document.getElementsByClassName("inCart").length; i++) {

            itemsArray[i] = document.getElementsByClassName("inCart")[i].name;
        }
        calculateTotal(itemsArray);
    }
}

/* ___________Buy Now____________ */
function buyNow(item) {
    //this function is direct from the slider and only allows one item to be placed in the cart for checkout
    var itemName = item.name;
    document.getElementById(itemName).className = "inCart";
    openCheckout();
    calculateTotal(itemName);
}

/* ___________Checkout Total Calculation____________ */
function calculateTotal(itemsArray) {
    //establish variable arrays to calculate pricing and receipt
    var items = ["Retro Traveler Purse", "Pinch of Punk Purse",
                "Hollywood Glam Purse", "Bohemian Handcrafted Bag", "City Commuter Purse", "Cherry on Top Handbag", "Little Black PocketBook", "International Traveler Purse", "Essential Clutch"];
    var prices = [50, 45, 35, 40, 60, 30, 25, 55, 20];
    var total = 0;

    //reset values for all HTML items that may have changed if customer cancelled or navigated away from the checkout page
    document.getElementById("itemsOrdered").innerHTML = "";
    document.getElementById("itemsSubtotal").innerHTML = "";
    document.getElementById("shippingCost").innerHTML = "";
    document.getElementById("taxCost").innerHTML = "";

    //for each item in the list
    for (var i = 0; i < itemsArray.length; i++) {
        //insert item to the items purchased list in order summary
        var currentText = document.getElementById("itemsOrdered").innerHTML;

        if (currentText == "") {
            document.getElementById("itemsOrdered").innerHTML = items[itemsArray[i]];
        } else {
            document.getElementById("itemsOrdered").innerHTML = currentText + ", " + items[itemsArray[i]];
        }
        document.getElementsByName("itemsOrdered")[0].value = document.getElementById("itemsOrdered").innerHTML;

        //add value of the items subtotal in order summary
        total += prices[itemsArray[i]];
        var subtotal = total.toFixed(2);
        document.getElementById("itemsSubtotal").innerHTML = "$" + subtotal;

    }
    document.getElementsByName("itemsSubtotal")[0].value =
    document.getElementById("itemsSubtotal").innerHTML;

    //add shipping to the subtotal and in order summary
    shipping = 9.99;
    document.getElementById("shippingCost").innerHTML = "$" + shipping;
    document.getElementsByName("shippingCost")[0].value = "$" + shipping;
    total = parseFloat(total) + parseFloat(shipping);

    //add tax to subtotal and in order summary
    var tax = total * 0.06;
    tax = tax.toFixed(2);
    document.getElementById("taxCost").innerHTML = "$" + tax;
    document.getElementsByName("taxCost")[0].value = "$" + tax;
    total = parseFloat(total) + parseFloat(tax);
    total = total.toFixed(2)
    document.getElementById("totalCost").innerHTML = "$" + total;
    document.getElementsByName("totalCost")[0].value = "$" + total;
}

function validateAndPost() {
    //check all form information is valid
    if (document.myForm.fName.className != "valid" ||
        document.myForm.lName.className != "valid" ||
        document.myForm.street.className != "valid" ||
        document.myForm.city.className != "valid" ||
        document.myForm.state.className != "valid" ||
        document.myForm.zip.className != "valid" ||
        document.myForm.phone.className != "valid" ||
        document.myForm.expirationDate.className != "valid" ||
        document.myForm.creditCard.className != "valid" &&
        (document.myForm.radio[0].checked != true ||
         document.myForm.radio[1].checked != true ||
         document.myForm.radio[2].checked != true)) {

        //or send error message to the user
        document.getElementById("message").innerHTML = "Please make sure your information is complete before submitting your order.";
        document.getElementById("message").style.display = "block";

    } else {
        return true;
    }

    return false;
}

/* ___________Cancel or Confirm____________ */
function confirmAndPost(button) {
    return true;
}
