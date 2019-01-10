function onPageLoad() {
	$("#pOne").fadeOut(5000);
	$("#pTwo").delay(1000).fadeOut(5000);
	$("#pThree").delay(2000).fadeOut(5000);
}
	
$(document).ready(onPageLoad);

