/* ___________Slider Left/Right Arrows____________ */
function arrow(arrow) {
    //establish variables to be used in the slider
    var i = (document.getElementById("leftArrow").name);
    var titles = ['Oh So Retro Traveller', 'Pinch of Punk Purse', 'Hollywood Glam Purse'];
    var texts = ['This vintage style purse is a new twist on an old classic. Embossed leather creates a feminine look. The soft camel color and honey highlights make the purse a staple for any closet. Extra large pockets, a sturdy zipper, and an over the shoulder strap give the fashionable purse function.', 'This purse is tough. Sturdy leather with gold studs and hardware add character. This purse includes a matching coin purse and features an interior pocket large enough to fit a standard tablet. When you need something edgy to coordinate with your look, this purse is the one.', 'Every girl needs some bling and this purse is reminicent of the Hollywood starlet. It feature a delicate rhinestone strap, a zipper, and three interior pockets. This purse may look small, but she packs all your date night essentials with room to spare.'];

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
    document.getElementById("leftArrow").setAttribute("name", i);
    document.getElementById("sliderImage").setAttribute("src", "images/purse" + i + "large.jpg");
    document.getElementById("sliderImage").setAttribute("alt", "Purse " + i);
    document.getElementById("sliderTitle").innerHTML = titles[i];
    document.getElementById("sliderText").innerHTML = texts[i];
    document.getElementById("buyNow").setAttribute("name", i);
}