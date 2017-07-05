	<form  method="post" id="addCarsForm">
		<label for="carsBrand">Brand</label>
		<select name="carsBrand" id="carsBrand">
			<option selected>select</option>
			<option>honda</option>
			<option>tesla</option>
			<option>volkswagen</option>
			<option>other</option>
		</select>
		<label for="carsModel">Brand model</label>
		<select name="carsModel" id="carsModel">
			<option selected>select</option>
		</select>
		<label for="carsEngine">Engine</label>
		<select name="carsEngine">
			<option selected>select</option>
			<option>gasoline</option>
			<option>diesel</option>
			<option>methane</option>
			<option>hybrid</option>
			<option>electric</option>
		</select>
		
		<label for="carsColor">Color</label>
		<select name="carsColor">
			<option selected>select</option>
			<option>white</option>
			<option>silver</option>
			<option>black</option>
			<option>other</option>
		</select>
				
		<label for="addCarsPrice">Price</label>
		<input type="number" name="carsPrice"/>
				
		<label for="carsImage">Image</label>
		<input name="carsImage" id="carsImage" type="file"/>


		<input type="submit" id="submitCar" value="Submit"/>
	</form>
	<?php
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if($_POST["carsBrand"] == "select"){
			$selectedBrand="unknown";
		}else{
		$selectedBrand = $_POST["carsBrand"];
		}
		if($_POST["carsModel"] == "select"){
			$selectedModel="unknown";
		}else{
		$selectedModel = $_POST["carsModel"];
		}
		if($_POST["carsEngine"] == "select"){
			$selectedEngine="unknown";
		}else{
		$selectedEngine = $_POST["carsEngine"];
		}
		if($_POST["carsColor"] == "select"){
			$selectedColor="unknown";
		}else{
		$selectedColor = $_POST["carsColor"];
		}
		if(empty($_POST["carsPrice"])){
			$selectedPrice="unknown";
		}else{
		$selectedPrice = $_POST["carsPrice"];
		}
		if(empty($_POST["carsImage"])){
			$selectedImage="unknown";
		}else{
		$selectedImage = $_POST["carsImage"];
		}
		try{
			global $db;
			$inserts = $db->prepare("INSERT INTO car( brand, model, engine, color, price, image) VALUES(:selectedBrand, :selectedModel, :selectedEngine, :selectedColor, :selectedPrice, :selectedImage)");
			$inserts->bindParam(':selectedBrand', $selectedBrand);
			$inserts->bindParam(':selectedModel', $selectedModel);
			$inserts->bindParam(':selectedEngine', $selectedEngine);
			$inserts->bindParam(':selectedColor', $selectedColor);
			$inserts->bindParam(':selectedPrice', $selectedPrice);
			$inserts->bindParam(':selectedImage', $selectedImage);
			$inserts->execute();
		}
		catch(Exception $e){
			echo $e->getMessage();
			exit;
		}
	}
?>