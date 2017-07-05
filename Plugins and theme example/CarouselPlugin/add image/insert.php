<?php

$name = $_POST['slider_image_name'];
$slider_image_description = $_POST['slider_image_description'];
$imageurl = $_POST['imageurl'];

session_start();

if(empty($_SESSION['sliderSlidesInfo'])){
	$_SESSION['sliderSlidesInfo'] = array();
	$sliderSlidesInfoCount = 0;
	$_SESSION['sliderSlidesInfoCount'] = $sliderSlidesInfoCount;
}else{
	$sliderSlidesInfoCount = $_SESSION['sliderSlidesInfoCount'];
	$sliderSlidesInfoCount++;
	$_SESSION['sliderSlidesInfoCount'] = $sliderSlidesInfoCount;
}
$slide = array($sliderSlidesInfoCount,$name,$slider_image_description,$imageurl);
array_push($_SESSION['sliderSlidesInfo'],$slide);

?>