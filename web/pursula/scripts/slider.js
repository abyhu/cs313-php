/* ___________Slider Left/Right Arrows____________ */
function arrow(arrow) {
    //establish variables to be used in the slider
    var i = (document.getElementById("leftArrow").name);

    //the next item depends on which slider button was selected
    if (arrow.value == "<") {
        if (i == 1) {
            i = 3;
        } else {
            i--;
        }
    } else {
        if (i == 3) {
            i = 1;
        } else {
            i++;
        }
    }
    //change the slider items to the newly selected item
    document.getElementById("leftArrow").setAttribute("name", i);
}