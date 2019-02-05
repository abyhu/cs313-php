/* ___________Slider Left/Right Arrows____________ */
function arrow(arrow) {
    //establish variables to be used in the slider
    var i = (document.getElementById("leftArrow").name);

    //the next item depends on which slider button was selected
    if (arrow.value == "<") {
        if (i == 0) {
            i = 2;
        } else {
            i = i - 1;
        }
    } else {

        if (i == 2) {
            i = 0;
        } else {
            i++;
        }
    }
    //change the slider items to the newly selected item
 	window.open('index.php','_self',false); 
}