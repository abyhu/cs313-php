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

    //hide and display appropriate content for the selected nav item
    if (itemClass == "0") {
        document.title = "Pursula Home";
        document.getElementById("index").style.display = "block";
        document.getElementById("shop").style.display = "none";
        document.getElementById("references").style.display = "none";
        document.getElementById("checkout").style.display = "none";
        resetForm();
    } else if (itemClass == "1") {
        document.title = "Pursula Shop";
        document.getElementById("index").style.display = "none";
        document.getElementById("shop").style.display = "block";
        document.getElementById("references").style.display = "none";
        document.getElementById("checkout").style.display = "none";
    } else if (itemClass == "2") {
        document.title = "Pursula References";
        document.getElementById("index").style.display = "none";
        document.getElementById("shop").style.display = "none";
        document.getElementById("references").style.display = "block";
        document.getElementById("checkout").style.display = "none";
    } else if (itemClass == "3") {
        navItem.href = "http://www.facebook.com";
    } else if (itemClass == "4") {
        navItem.href = "http://www.gmail.com";
    } else {
        console.log("error");
    }

    //keep the user at the top of the new page and clear error messages
    window.scrollTo(0, 0);
    document.getElementById("message").innerHTML = "";
    document.getElementById("message").style.display = "block";
}




