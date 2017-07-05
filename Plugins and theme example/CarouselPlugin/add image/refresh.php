<?php
session_start();
delete_option('selectedSlideId'); 
delete_option('selectedSlide');
delete_option('selectedSlider');

$numberOfSlides = count($_SESSION['sliderSlidesInfo']);

			?>
			
			<option selected>select a slide</option>
			<?php

				for($row=0;$row<$numberOfSlides;$row++){
			?>			
			<option id="<?php echo $row;?>"><?php echo $_SESSION['sliderSlidesInfo'][$row][1]; ?></option>
			<?php 			

				
			}


			?>
