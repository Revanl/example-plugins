<?php 
session_start();
$name = get_option('selectedSlide');
$position = get_option('selectedSlideId'); 
$selectedSlider = get_option('selectedSlider');


			unset($_SESSION['sliderSlidesInfo'][$position]);
			
			$_SESSION['sliderSlidesInfo'] = array_values($_SESSION['sliderSlidesInfo']);
			die();
		
?>