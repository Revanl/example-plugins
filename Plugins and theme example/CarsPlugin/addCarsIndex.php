<?php
/*
Plugin name: Cars Plugin
*/

session_start();
require_once('connect.php');
add_action( 'admin_enqueue_scripts', 'addCarsStyle' );
function addCarsStyle() {
    wp_enqueue_style( 'addCarsStyle', plugins_url('addCarsStyle.css', __FILE__) );
}

function addCarsAjax(){
	wp_enqueue_script( 'addCarsAjax', plugins_url( '/addCarsAjax.js', __FILE__ ), array('jquery'), '1.0', true );
	wp_localize_script( 'addCarsAjax', 'addCarsAjax', array(
		'ajax_url' => admin_url( 'admin-ajax.php' )
	));
}
add_action('admin_enqueue_scripts', 'addCarsAjax');

function getBrandModels(){
	include("getBrandModels.php");
	die();
}
add_action('wp_ajax_getBrandModels', 'getBrandModels');
add_action('wp_ajax_nopriv_getBrandModels', 'getBrandModels');

function carsFilter(){
	include("carsFilter.php");
	die();
}
add_action('wp_ajax_carsFilter', 'carsFilter');
add_action('wp_ajax_nopriv_carsFilter', 'carsFilter');

function carsFound(){
?>
<div class="col-2 col-m-2" id="carsFound">
	<span>
	<?php 
	echo $_SESSION["fetchedResults"];
	?>
	</span>
</div>
<?php
die();
}
add_action('wp_ajax_carsFound', 'carsFound');
add_action('wp_ajax_nopriv_carsFound', 'carsFound');


function login(){
include("login.php");
}
add_action('wp_ajax_login', 'login');
add_action('wp_ajax_nopriv_login', 'login');


function register(){
include("register.php");
}
add_action('wp_ajax_register', 'register');
add_action('wp_ajax_nopriv_register', 'register');

function checkPrice(){
include("CheckPrice.php");
}
add_action('wp_ajax_checkPrice', 'checkPrice');
add_action('wp_ajax_nopriv_checkPrice', 'checkPrice');


add_action("carsPanel_hook","getCarsMain");
function getCarsMain(){
		wp_enqueue_script( 'getCarsAjax', plugins_url( '/getCarsAjax.js', __FILE__ ), array('jquery'), '1.0', true );
	wp_localize_script( 'getCarsAjax', 'getCarsAjax', array(
		'ajax_url' => admin_url( 'admin-ajax.php' )
	));
?>
<div class="headerForAddCar">
<?php
include("headerForAddCar.php");
?>
</div>


	
<div id="carsFinderPanel">
<div class="col-4 col-m-4" id="searchForCar">
<span class="glyphicon glyphicon-search"></span>
	<span>	
		Search for an automobile
	</span>
</div>
<div class="col-2 col-m-2" id="carsFound">
<span>
<?php 
try{
	global $db;
	$query = $db->prepare("SELECT * FROM car");
	$query->execute();
	$result = $query -> fetchAll();
	echo count($result);
}
catch(Exception $e){
	echo $e->getMessage();
	exit;
}
?>
</span>
</div>

<form action="" method="post" id="getCarsForm" class="col-12 col-m-12">
		<div class="col-4 col-m-4">
			<label for="carsBrand">Brand</label>
			<select name="carsBrand" class="carsBrand">
				<option selected>select</option>
				<option>honda</option>
				<option>tesla</option>
				<option>volkswagen</option>
				<option>other</option>
			</select>
		</div>
		<div class="col-4 col-m-4">
			<label for="carsModel">Model</label>
			<select name="carsModel" class="carsModel">
				<option selected>select</option>
			</select>
		</div>	
		<div class="col-4 col-m-4">
			<label for="carsPrice">Price</label>
			<input type="range" min class="carsPrice">
		</div>		
		<div class="col-4 col-m-4">
			<label for="carsEngine">Engine</label>
			<select class="carsEngine">
				<option selected>select</option>
				<option>gasoline</option>
				<option>diesel</option>
				<option>methane</option>
				<option>hybrid</option>
				<option>electric</option>
			</select>
		</div>
		<div class="col-4 col-m-4 ">		
			<label for="carsColor">Color</label>
			<select class="carsColor classic">
				<option selected>select</option>
				<option>white</option>
				<option>silver</option>
				<option>black</option>
				<option>other</option>
			</select>
		</div>
		<div class="col-4 col-m-4">
			<input type="submit" id="filterCars" value="Submit">
		</div>
	</form>
</div>
<div class="col-12 col-m-12" id="carsFilter">

</div>
<?php
}
?>