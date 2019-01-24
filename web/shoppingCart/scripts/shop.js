/* ___________Add Cart____________ */
function addCart(shopItem) {
	var itemId = {id: shopItem.id};  
		//toggle between addCart and inCart classes on each click
   		if (shopItem.className == "addCart") {
       		shopItem.className = "inCart";
			shopItem.value = "In Your Cart";
			$.post('scripts/addToCart.php', itemId); 
   		} else if (shopItem.className = "inCart") {
     		shopItem.className = "addCart";
			shopItem.value = "Add To Cart";
			$.post('scripts/removeCart.php', itemId); 
		}
}

/* ___________Open Checkout____________ */
function openCheckout() {
	window.open('checkout.php','_self',false)
}
	

		
	