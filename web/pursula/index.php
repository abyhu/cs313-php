<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Pursula">
	<title>Pursula</title>
	
	<!--INCLUDE HEAD-->
	<?php include('modules/head.php'); ?>
	
	<!--INCLUDE HEADERNAV-->
	<?php $page = 'index.php'; include('modules/headerNav.php'); ?>
  

            <div id="index">
                <div id="slider">
					//<?php include('scripts/slider.php'); ?>
                    <input type="button" id="leftArrow" value="<" onclick="arrow(this)" name="1" />
                    <img src="images/purse1large.jpg" alt="Purse 1" id="sliderImage" />
                    <div id="sliderTextDiv">
                        <h2 id="sliderTitle">Pinch of Punk Purse</h2>
                        <p id="sliderText">This purse is tough. Sturdy leather with gold studs and hardware add character. This purse includes a matching coin purse and features an interior pocket large enough to fit a standard tablet. When you need something edgy to coordinate with your look, this purse is the one.</p>
                        <input type="button" id="buyNow" name="1" value="Buy Now" onclick="buyNow(this)" />
                    </div>
                    <input type="button" id="rightArrow" value=">" onclick="arrow(this)" />
                </div>
            </div>

            
	<!--INCLUDE FOOTER-->
	<?php include('modules/footer.php'); ?>
            
