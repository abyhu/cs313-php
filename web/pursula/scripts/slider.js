/* ___________Slider Left/Right Arrows____________ */
function arrow(arrow, products) {
    //establish variables to be used in the slider
    var i = (document.getElementById("leftArrow").name);
	var productNum = (int) "<?php echo $_SESSION['productNum'] ?>";

    //the next item depends on which slider button was selected
    if (arrow.value == "<") {
        if (i == 0) {
            i = productNum;
        } else {
            i--;
        }
    } else {
        if (i == productNum) {
            i = 0;
        } else {
            i++;
        }
    }
    //change the slider items to the newly selected item
    document.getElementById("leftArrow").setAttribute("name", i);
    document.getElementById("sliderImage").setAttribute("src", "images/purse" + i + "large.jpg");
    document.getElementById("sliderImage").setAttribute("alt", "Purse " + i);
    //document.getElementById("sliderTitle").innerHTML = products[i].;
    //document.getElementById("sliderText").innerHTML = products[i].description;
    document.getElementById("buyNow").setAttribute("name", i);
}