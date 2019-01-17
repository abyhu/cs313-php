/* ___________Nav Bar Wayfinding____________ */
function activateNavItem(navItem) {
    //for all navigation items reset the id to ""
    var navItemsList = document.getElementsByClassName("nav");
    for (var i = 0; i < navItemsList.length; i++) {
        navItemsList[i].setAttribute("id", "");
    }
    //set the selected id to an active attribute
    navItem.setAttribute("id", "active");
    var itemClass = navItem.classList[1];
}




