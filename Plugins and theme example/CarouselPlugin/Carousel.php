<?php

	$sliderImageName = ('#'.$attrs["name"]);
	$captionArray = explode(';', $attrs['caption']);
	$imageArray = explode(';', $attrs['image']);
	$sliderControls = explode(';', $attrs['controls']);

	
?>
<div id="<?php echo $attrs["name"];?>" class="carousel slide" data-ride="carousel" data-interval="<?php echo $attrs['autoplay'];?>" style="clear:both;margin:auto">
<!-- Indicators -->

<!-- Wrapper for slides -->

	<ol class="<?php echo $attrs['indicators'];?>">
	<?php
for($slideIndNum=0;$slideIndNum<count($imageArray);$slideIndNum++){?>
		<li data-target="<?php echo $sliderImageName;?>" data-slide-to="<?php echo $slideIndNum; ?>" <?php if($slideIndNum==1){echo 'class="active"'; }?>></li>
<?php } ?>
	</ol>
	<div class="carousel-inner " style="width:<?php echo $attrs['fullwidth'];?>; margin:auto">
<?php

for($slideNum=0;$slideNum<count($imageArray);$slideNum++){?>
	<div class="item <?php if ($slideNum==0){ echo 'active';}?>"> 
		<img class="<?php echo $attrs['shape'];?>" src='<?php echo $imageArray[$slideNum];?>' alt="Slider image" style="height:<?php echo $attrs['height'];?>; width:<?php echo $attrs['width'];?>;">
		<div class="carousel-caption" style="
		font:<?php echo $attrs['font'];?>;
		color:<?php echo $attrs['color'];?>;">
		
	
			<?php 
			echo $captionArray[$slideNum]; 
			?>
		</div>
	</div>	
<?php } ?>
</div>

	
<!-- Left and right controls -->
	<a class="left <?php echo $sliderControls[0];?>" href="<?php echo $sliderImageName;?>" data-slide="prev">
	 	<span class="glyphicon glyphicon-<?php echo $sliderControls[1];?>-left" style="top:50%">&nbsp;</span>
	</a>
	
    <a class="right <?php echo $sliderControls[0];?>" href="<?php echo $sliderImageName;?>" data-slide="next">
		<span class="glyphicon glyphicon-<?php echo $sliderControls[1];?>-right" style="top:50%">&nbsp;</span>
    </a>
</div>