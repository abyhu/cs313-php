/* ___________Nav Bar Wayfinding____________ */
function activateNavItem(navItem) {
    //for all navigation items reset the id to ""
    var navItemsList = document.getElementsByClassName("nav");
    for (var i = 0; i < navItemsList.length; i++) {
        navItemsList[i].setAttribute("id", "");
    }
    //set the selected id to an active attribute
	var page = location.pathname;
	$('.nav').each(function() {
		var $this = $(this); 
		//if the path and link are the same - make id active 
		if($this.attr('href').indexOf(current) !== -1) {
			$this.addId('active');
		}
	})
}




