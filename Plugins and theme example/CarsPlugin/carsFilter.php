<?php
session_start();
$selectedBrand = $_POST["selectedBrand"];
$selectedModel = $_POST["selectedModel"];
$selectedEngine = $_POST["selectedEngine"];
$selectedColor = $_POST["selectedColor"];
$selectedPrice = $_POST["selectedPrice"];
?>

<div class="col-12 col-m-12" id="carsFilter">
<?php
try{
	global $db;
	$select = 'SELECT *';
	$from = 'FROM car';
	$where = ' WHERE TRUE';
	if($_POST["selectedBrand"] != "select"){
		$where .=" AND brand = :brand";
	}
	if($_POST["selectedModel"] != "select"){
		$where .=" AND model = :model";
	}
	if($_POST["selectedEngine"] != "select"){
		$where .=" AND engine = :engine";
	}
	if($_POST["selectedColor"] != "select"){
		$where .=" AND color = :color";
	}
//	if($_POST["selectedPrice"] != "select"){
//		$where .=" AND price = :price";
//	}
$sql = $select . $from . $where;
$query = $db->prepare($sql);
if($_POST["selectedBrand"] != "select"){
	$query -> bindParam(':brand',$selectedBrand);
}
if($_POST["selectedModel"] != "select"){
	$query -> bindParam(':model',$selectedModel);
}
if($_POST["selectedEngine"] != "select"){
	$query -> bindParam(':engine',$selectedEngine);
}
if($_POST["selectedColor"] != "select"){
	$query -> bindParam(':color',$selectedColor);
}
//	if($_POST["selectedPrice"] != "select"){
	//$query -> bindParam(':price',$selectedPrice);
//}
$query->execute();


//	$query = $db->prepare("SELECT * FROM car WHERE brand = :brand and".if ($selectedModel!="select"){ . "model = :model "}.);
//	$query -> bindParam(':brand',$selectedBrand);
//	$query -> bindParam(':model',$selectedModel);
//	$query -> bindParam(':engine',$selectedEngine);
//	$query -> bindParam(':color',$selectedColor);
//	$query -> bindParam(':price',$selectedPrice);
//	$query->execute();
	$result = $query -> fetchAll();
	 $fetchedResults = count($result);
	 $_SESSION["fetchedResults"] = $fetchedResults;
	foreach( $result as $row ) {
		?>
		<div class="carFrame col-6 col-m-6">
			<img class="carImage col-5 col-m-5" height="200" src="<?php echo $row['image'];?>" alt="car image">
			<div class="carInfo col-7 col-m-7">
				<div class="carDescription">brand: <?php echo $row['brand']; ?></div>	
				<div class="carDescription">model: <?php echo $row['model']; ?></div>	
				<div class="carDescription">engine: <?php echo $row['engine']; ?></div>	
				<div class="carDescription">color: <?php echo $row['color']; ?></div>	
				<div class="carDescription">price: <?php echo $row['price']; ?></div>			
			</div>
		</div>
		<?php
	}
}
catch(Exception $e){
	echo $e->getMessage();
	exit;
}
?>
</div>