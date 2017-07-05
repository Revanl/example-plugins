<?php
session_start();
$sliderName = $_POST["sliderName"];
$selectImgShape	 = $_POST["selectImgShape"];
$SliderAutoplaySec = $_POST["autoplaySec"];
$SliderIndicators = $_POST['SliderIndicators'];
$SliderImageFullWidth = $_POST['SliderImageFullWidth'];
$sliderImgHeight = $_POST['sliderImgHeight'];
$SliderImageHeightUnit = $_POST['SliderImageHeightUnit'];
$sliderImgWidth = $_POST['sliderImgWidth'];
$SliderImageWidthUnit = $_POST['SliderImageWidthUnit'];
$sliderFontFamily = $_POST['sliderFontFamily'];
$sliderFontSize = $_POST['sliderFontSize'];
$sliderFontWeight = $_POST['sliderFontWeight'];
$sliderFontStyle = $_POST['sliderFontStyle'];
$sliderTextColor = $_POST['sliderTextColor'];	
$SliderControls = $_POST['SliderControls'];
$SelectSliderControls = $_POST['SelectSliderControls'];

$numberOfSlides = count($_SESSION['sliderSlidesInfo']);
	echo ' caption="';
	for($captionCount=0;$captionCount<$numberOfSlides;$captionCount++){
		if($captionCount!=0){
			echo ';';
		}
		echo $_SESSION['sliderSlidesInfo'][$captionCount][2];	
	}
	echo '"';
	
	echo ' image="';
	for($captionCount=0;$captionCount<$numberOfSlides;$captionCount++){
		if($captionCount!=0){
			echo ';';
		}
		echo $_SESSION['sliderSlidesInfo'][$captionCount][3];	
	}
	echo '"';
	
	echo ' shape="';
		echo $selectImgShape;
	echo '"';
	echo ' height="';
		echo $sliderImgHeight;	
		echo $SliderImageHeightUnit;
	echo '"';
	echo ' width="';
		echo $sliderImgWidth;
		echo $SliderImageWidthUnit;
	echo '"';
	echo ' fullwidth="';
		echo $SliderImageFullWidth;
	echo '"';
	echo ' font="';
		echo $sliderFontStyle;		
	echo ' ';
		echo $sliderFontWeight;
	echo ' ';
		echo $sliderFontSize;echo "px";
	echo ' ';
		echo $sliderFontFamily;
	echo '"';
	echo ' color="';
		echo $sliderTextColor;
	echo '"';
	echo ' autoplay="';
		echo $SliderAutoplaySec;
	echo '"';
	echo ' indicators="';
		echo $SliderIndicators;
	echo '"';
	echo ' controls="';
		echo $SliderControls;
		echo ';';
		echo $SelectSliderControls;
	echo '"';
	echo ' name="';
		echo $sliderName;
	echo '"';
	?>