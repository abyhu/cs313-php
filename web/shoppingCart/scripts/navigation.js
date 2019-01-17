/* ___________Nav Bar Wayfinding____________ */
function activateNavItem(navItem) {
    //for all navigation items reset the id to ""
    var navItemsList = document.getElementsByClassName("nav");
    for (var i = 0; i < navItemsList.length; i++) {
        navItemsList[i].setAttribute('id', '');
    }
    //set the selected id to an active attribute
	var page = window.location.href;
	console.log(page); 
	console.log(this.href);
	$('.nav').each(function() {
		//if the path and link are the same - make id active 
		if(this.href == path) {
			$(this).attr('id', 'active');
		}
	})
}




