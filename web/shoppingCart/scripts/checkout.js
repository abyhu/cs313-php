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

///*___________Buy Now____________*/
//function buyNow(item) {
//    //this function is direct from the slider and only allows one item to be placed in the cart for checkout
//    var itemName = item.name;
//    document.getElementById(itemName).className = "inCart";
//    openCheckout();
//    calculateTotal(itemName);
//}
//
//
/* ___________Checkout Total Calculation____________ */
function calculateTotal(itemsArray) {
    //establish variable arrays to calculate pricing and receipt
    var prices = [50, 45, 35, 40, 60, 30, 25, 55, 20];
    var total = 0;

    //reset values for all HTML items that may have changed if customer cancelled or navigated away from the checkout page
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
//
//function validateAndPost() {
//    //check all form information is valid
//    if (document.myForm.fName.className != "valid" ||
//        document.myForm.lName.className != "valid" ||
//        document.myForm.street.className != "valid" ||
//        document.myForm.city.className != "valid" ||
//        document.myForm.state.className != "valid" ||
//        document.myForm.zip.className != "valid" ||
//        document.myForm.phone.className != "valid" ||
//        document.myForm.expirationDate.className != "valid" ||
//        document.myForm.creditCard.className != "valid" &&
//        (document.myForm.radio[0].checked != true ||
//         document.myForm.radio[1].checked != true ||
//         document.myForm.radio[2].checked != true)) {
//
//        //or send error message to the user
//        document.getElementById("message").innerHTML = "Please make sure your information is complete before submitting your order.";
//        document.getElementById("message").style.display = "block";
//
//    } else {
//        return true;
//    }
//
//    return false;
//}
//
///* ___________Cancel or Confirm____________ */
//function confirmAndPost(button) {
//    return true;
//}
