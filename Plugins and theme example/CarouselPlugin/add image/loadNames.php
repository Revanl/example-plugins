<?php

//Connect to the DB

require_once('connect.php');
$selectedSlider = get_option('selectedSlider');
		try{
		
		global $db;
		$results = $db->prepare('SELECT*FROM '. $selectedSlider .' ORDER BY id ASC');
		$results->execute();
		$names = $results->fetchAll(PDO::FETCH_ASSOC);
		$results->closeCursor();
		}
		catch(Exception $e){
			echo $e->getMessage();
			exit;
		}
		if($names==true){?>
		
			<select id="selectSlide">
			<option selected>select a slide</option>
			<?php foreach($names as $name){
				$name = $name['slider_image_name']; ?>
			<option value="<?php echo $name; ?>"><?php echo $name; ?></option>
			<?php } ?>
			</select>
			<?php } ?>
