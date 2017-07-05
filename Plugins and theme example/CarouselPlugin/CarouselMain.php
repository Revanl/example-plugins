<?php
/*
Plugin name: Carousel Plugin
*/
function buttonsAndAjax(){
	wp_enqueue_script( 'addAjax', plugins_url( '/scallImageSlider.js', __FILE__ ), array('jquery'), '1.0', true );
	wp_localize_script( 'addAjax', 'sliderButton', array(
		'ajax_url' => admin_url( 'admin-ajax.php' )
	));
}
add_action('admin_enqueue_scripts', 'buttonsAndAjax');

	

add_action('admin_menu','Midnight_Image_Slider');
function Midnight_Image_Slider(){
	add_menu_page('Image-Slider', 'Image-Slider', 5,'Image_Slider_Mainpage','Image_Slider_Mainpage');
}
add_action('wp_ajax_addNewSlider', 'addNewSlider');
add_action('wp_ajax_nopriv_addNewSlider', 'addNewSlider');
function addNewSlider(){
	include('add image/addNewSlider.php');
}
add_action('wp_ajax_insertImage', 'insertImage');
add_action('wp_ajax_nopriv_insertImage', 'insertImage');
function insertImage(){
	include('add image/insertImage.php');
}
add_action('wp_ajax_slideDecrement', 'slideDecrement');
add_action('wp_ajax_nopriv_slideDecrement', 'slideDecrement');
function slideDecrement(){
	include('add image/slideDecrement.php');
}
add_action('wp_ajax_slideIncrement', 'slideIncrement');
add_action('wp_ajax_nopriv_slideIncrement', 'slideIncrement');
function slideIncrement(){
	include('add image/slideIncrement.php');
}
add_action( 'wp_ajax_insert', 'insert' );
add_action( 'wp_ajax_nopriv_insert', 'insert' );
function insert(){
	include('add image/insert.php');
}
add_action( 'wp_ajax_refresh', 'refresh' );
add_action( 'wp_ajax_nopriv_refresh', 'refresh' );
function refresh(){
	include('add image/refresh.php');
	die();
}
add_action('wp_ajax_selectImgShape','selectImgShape');
add_action('wp_ajax_nopriv_selectImgShape','selectImgShape');
function selectImgShape(){
	include('add image/selectImgShape.php');
}
add_action('wp_ajax_sliderImgSize','sliderImgSize');
add_action('wp_ajax_nopriv_sliderImgSize','sliderImgSize');
function sliderImgSize(){
	include('add image/sliderImgSize.php');
}
add_action('wp_ajax_selectSlide','selectSlide');
add_action('wp_ajax_nopriv_selectSlide','selectSlide');
function selectSlide(){
	include('add image/selectSlide.php');
}
add_action('wp_ajax_deleteSlide','deleteSlide');
add_action('wp_ajax_nopriv_deleteSlide','deleteSlide');
function deleteSlide(){
	include('add image/deleteSlide.php');
}
add_action('wp_ajax_renameSlide', 'renameSlide');
add_action('wp_ajax_nopriv_renameSlide', 'renameSlide');
function renameSlide(){
	include('add image/renameSlide.php');
}
add_action('wp_ajax_editCaptionSlide', 'editCaptionSlide');
add_action('wp_ajax_nopriv_editCaptionSlide', 'editCaptionSlide');
function editCaptionSlide(){
	include('add image/editCaptionSlide.php');
}
add_action('wp_ajax_editImageurl2Slide', 'editImageurl2Slide');
add_action('wp_ajax_nopriv_editImageurl2Slide', 'editImageurl2Slide');
function editImageurl2Slide(){
	include('add image/editImageurl2Slide.php');
}
add_action('wp_ajax_changeSliderCaptionStyle', 'changeSliderCaptionStyle');
add_action('wp_ajax_nopriv_changeSliderCaptionStyle', 'changeSliderCaptionStyle');
function changeSliderCaptionStyle(){
	include('add image/changeSliderCaptionStyle.php');
}

add_action('wp_ajax_convertArray', 'convertArray');
add_action('wp_ajax_nopriv_convertArray', 'convertArray');
function convertArray(){

	include('add image/convertArray.php');

		die();
}


		
add_action('wp_ajax_GetPostDetails', 'GetPostDetails');
add_action('wp_ajax_nopriv_GetPostDetails', 'GetPostDetails');
function GetPostDetails(){

do_action('wp_enqueue_scripts', 'add_bootstrap');
wp_enqueue_media();

$siteUrl= get_site_url();
$sliderSetCss = "/wp-content/plugins/GoatCarousel/add%20image/Slider%20settings.css";
$output .= '<link rel="stylesheet" type="text/css" href="'. $siteUrl.$sliderSetCss .'">';	
$sliderSetJs = "/wp-content/plugins/GoatCarousel/add%20image/Slider%20settings.js";
$output .= '<script type="text/javascript" src="'. $siteUrl.$sliderSetJs .'"></script>';
$assigneImage= "/wp-content/plugins/GoatCarousel/add%20image/assignImage.js";
$assigneImage2= "/wp-content/plugins/GoatCarousel/add%20image/assignImage2.js";

$output .= '<script type="text/javascript" src= "'.  $siteUrl.$assigneImage.'"></script>';
$output .= '<script type="text/javascript" src= "'.  $siteUrl.$assigneImage2.'"></script>';
echo $output;
session_start();
	unset($_SESSION['sliderSlidesInfo']);
	unset($_SESSION['sliderSlidesInfoCount']);


include ('sliderSettingsPanel.php');

die();
}

add_action('wp_ajax_insertNewSlider','insertNewSlider');
add_action('wp_ajax_nopriv_insertNewSlider','insertNewSlider');
function insertNewSlider(){
	include('Carousel.php');
	wp_die();
}

add_action('wp_ajax_deleteSlider','deleteSlider');
add_action('wp_ajax_nopriv_deleteSlider','deleteSlider');
function deleteSlider(){

}
add_action('admin_head', 'subscribe_button_add_my_button');

function subscribe_button_add_my_button() {
    global $typenow;
    // check user permissions
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
    return;
    }
    // verify the post type
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return;
    // check if WYSIWYG is enabled
    if ( get_user_option('rich_editing') == 'true') {
        add_filter("mce_external_plugins", "subscribe_button_add_tinymce_plugin");
        add_filter('mce_buttons', 'subscribe_button_register_my_button');
	}
}
function subscribe_button_add_tinymce_plugin($plugin_array) {

	$plugin_array['ImageSlider'] = plugins_url('/scallImageSlider.js',__FILE__);

 return $plugin_array;
}
function subscribe_button_register_my_button($buttons) {

   array_push($buttons, "ImageSlider");

   return $buttons;
}	
function subscribe_button_css() {
    wp_enqueue_style('subscribe_button_css', plugins_url('/style.css', __FILE__));
}
add_action('admin_enqueue_scripts', 'subscribe_button_css');
?>