<?php
session_start();
$slider_image_name_change = $_POST['slider_image_name_change'];
$position = get_option('selectedSlideId'); 
$_SESSION['sliderSlidesInfo'][$position][1] = $slider_image_name_change;
	$success.="slide renamed";
	echo $success; die;
?>