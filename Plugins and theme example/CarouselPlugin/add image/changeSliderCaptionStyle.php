<?php
$sliderFontFamily = $_POST['sliderFontFamily'];
$sliderFontSize = $_POST['sliderFontSize'];
$sliderFontWeight = $_POST['sliderFontWeight'];
$sliderFontStyle = $_POST['sliderFontStyle'];
$sliderTextColor = $_POST['sliderTextColor'];


update_option('sliderFontFamily', $sliderFontFamily);
update_option('sliderFontSize', $sliderFontSize);
update_option('sliderFontWeight', $sliderFontWeight);
update_option('sliderFontStyle', $sliderFontStyle);
update_option('sliderTextColor', $sliderTextColor);

?>