<?php
session_start();
$slider_image_description_change = $_POST['slider_image_description_change'];
$position = get_option('selectedSlideId');
$_SESSION['sliderSlidesInfo'][$position[2] = $slider_image_description_change;
	$success.="Caption changed";
	echo $success; die;
?>