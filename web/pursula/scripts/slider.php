<?php
	
	require('scripts/connectToDb.php'); 
	$db = get_db(); 

	$data = $db->prepare("SELECT name, description FROM products WHERE description != ''"); 
	$data->execute(); 

	while ($row = $data->fetch(PDO::FETCH_ASSOC))
	{
		$ids[] = $row['id']; 
		$names[] = $row['name']; 
		$descriptions[] = $row['description']; 
	}

	<script> 
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
			document.getElementById("leftArrow").setAttribute("name", i);
			document.getElementById("sliderImage").setAttribute("src", "images/purse" + i + "large.jpg");
			document.getElementById("sliderImage").setAttribute("alt", "Purse " + i);
			//document.getElementById("sliderTitle").innerHTML = titles[i];
			//document.getElementById("sliderText").innerHTML = texts[i];
			//document.getElementById("buyNow").setAttribute("name", i);
		}
	</script>

	


?>