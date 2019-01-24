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