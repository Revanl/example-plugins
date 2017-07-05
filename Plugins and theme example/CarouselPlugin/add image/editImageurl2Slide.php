<?php
session_start();
$slider_image_url_change = $_POST['slider_image_url_change'];
$position = get_option('selectedSlideId');
$_SESSION['sliderSlidesInfo'][$position][3] = $slider_image_url_change;
	$success.="Image changed";
	echo $success; die;
?>