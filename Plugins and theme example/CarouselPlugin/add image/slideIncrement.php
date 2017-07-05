<?php
session_start();
$replaceThis = get_option('selectedSlideId'); 
$withThis = get_option('selectedSlideId')-1;
$selectedSlide = get_option('selectedSlide');
$selectedSlider = get_option('selectedSlider');

if($replaceThis != 0){
	$temp = $_SESSION['sliderSlidesInfo'][$replaceThis];
    $_SESSION['sliderSlidesInfo'][$replaceThis] = $_SESSION['sliderSlidesInfo'][$withThis];
	$_SESSION['sliderSlidesInfo'][$withThis] = $temp;
	die();
}

?>