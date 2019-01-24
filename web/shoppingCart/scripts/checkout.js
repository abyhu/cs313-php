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