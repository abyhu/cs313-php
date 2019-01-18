/* ___________Nav Bar Wayfinding____________ */
$(document).ready(activateNavItem);

function activateNavItem() {
    //for all navigation items reset the id to ""
    var navItemsList = document.getElementsByClassName("nav");
    for (var i = 0; i < navItemsList.length; i++) {
        navItemsList[i].setAttribute("id", "");
    }
    //set the selected id to an active attribute
	
	var page = window.location.href.split('/').pop();
	for (var i = 0; i < navItemsList.length; i++) {
		if (navItemsList[i].attr("href") === page) {
			navItemsList[i].setAttribute("id", "active");
		}
	}
}




