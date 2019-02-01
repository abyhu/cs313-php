/* ___________Nav Bar Wayfinding____________ */

function activateNavItem() {
    //for all navigation items reset the id to ""
    var navItemsList = document.getElementsByClassName("nav");
    for (var i = 0; i < navItemsList.length; i++) {
        navItemsList[i].setAttribute("id", "");
    }
	
    //set the selected id to an active nav item
	var page = window.location.href.split('/').pop();
	for (var i = 0; i < navItemsList.length; i++) {
		if ($(navItemsList[i]).attr("href") === page) {
			$(navItemsList[i]).attr("id", "active");
		}
	}
}




