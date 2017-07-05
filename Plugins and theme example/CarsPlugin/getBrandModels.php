<?php
$selectedBrand = $_POST['selectedBrand'];
if($selectedBrand == "select"||$selectedBrand == "other"){
	?>
<select class="carsModel" id="carsModel"  name="carsModel">
	<option selected>select</option>
</select>
	<?php
}
if($selectedBrand == "honda"){
?>
<select class="carsModel" id="carsModel"  name="carsModel">
	<option selected>select</option>
	<option>accord</option>
	<option>civic</option>
	<option>other</option>
</select>
<?php
}
if($selectedBrand == "tesla"){
?>
<select class="carsModel" id="carsModel" name="carsModel">
	<option selected>select</option>
	<option>model s</option>
	<option>other</option>
</select>
<?php
}
if($selectedBrand == "volkswagen"){
?>
<select class="carsModel" id="carsModel"  name="carsModel">
	<option selected>select</option>
	<option>golf</option>
	<option>passat</option>
	<option>other</option>
</select>
<?php
}
die();
?>