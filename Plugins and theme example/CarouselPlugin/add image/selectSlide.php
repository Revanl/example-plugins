<?php
$selectSlide = $_POST['selectSlide'];
$selectedSlideId = $_POST['selectedSlideId'];
if ($selectSlide != "select a slide"){
update_option('selectedSlide', $selectSlide);
update_option('selectedSlideId', $selectedSlideId);
$success = true;
echo $success; die;
}else{
	delete_option('selectedSlide');
	delete_option('selectedSlideId');
$error = false;
echo $error; die;
}
?>