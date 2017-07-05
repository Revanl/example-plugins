
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#sliderMainPage">Home</a></li>
    <li><a data-toggle="tab" href="#sliderAddImage">Add slides</a></li>
    <li><a data-toggle="tab" href="#sliderCaptionSettings">Slider captions</a></li>
    <li><a data-toggle="tab" href="#SliderChangeControls">Slider controls</a></li>
  </ul>

  <div class="tab-content">
			
	<div id="sliderMainPage" class="tab-pane fade text-center">


	</div>
									<!-- SLIDER IMAGES  -->	
									
									
									
									
									
									
									
    <div id="sliderAddImage" class="tab-pane fade text-center">
   		<div style="width:33%;float:left">
			<p>change slide positions</p>
			<br/>
			<a href="#"><div type="button" class="selectBox" id="slideIncrement" style="width:30%;display:inline">Move up</div></a>
			<a href="#"><div type="button" class="selectBox" id="slideDecrement" style="width:30%;display:inline">Move down</div></a>
			<br/>
			<br/>
			<select id="selectSlide" class="imageNameLoader" size="10">
			<?php include('add image/refresh.php');?>
			</select>
		</div>
		<div style="width:33%;float:left">
		<div> SLIDER NAME: </div>
		
			<input type="text" id="sliderName" required />
		
			<div>Images shape</div>
			<select id="selectImgShape" class="selectBox">
				<option value="Select" selected>Default</option>
				<option value="img-circle">Circle</option>
				<option value="img-rounded">Rounded</option>
				<option value="img-thumbnail">Thumbnail</option>
			</select>
			<form method="post" action="" id="sliderImgSizeForm">
				<div>Images height</div>
				<input type="text" id="sliderImgHeight" value="0" required/>
				<select id="SliderImageHeightUnit" class="selectBox">
					<option value="px" selected>px</option>
					<option value="%">%</option>
				</select>
				<div>Images width</div>
				<input type="text" id="sliderImgWidth" value="0" required /> 
				<select id="SliderImageWidthUnit" class="selectBox">
					<option value="px" >px</option>
					<option value="%" selected>%</option>
				</select>
				<br/>
				<p>pixels is recommended for height
				<br/>
				percentegaes</p>
				
			</form>
		</div>
				
		<div style="width:33%;float:left">
<a href="#">		
<div type="button" data-toggle="modal" class="selectBox" data-target="#SliderAddSlideModal">Add a slide</div>
</a>
  <!-- Modal -->
<div class="modal fade" id="SliderAddSlideModal" role="dialog">
    <div class="modal-dialog">
          <!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" data-target="#SliderAddSlideModal">&times;</button>
			  <h4 class="modal-title">Add a slide</h4>
			</div>
				<div class="modal-body">
					<form id="addNewSlideForm" action="" method="post">
					  <input type="text" class="inputSlide" id="slider_image_name" name="slider_image_name" required />Name
					  <br/>
					  <input type="text" class="inputSlide" id="slider_image_description" name="slider_image_description"/>Caption
					  
					  <br/>
					  <input id="image-url" class="inputSlide" type="text" name="image"  required  />Image
					  <br/>
					  <input id="upload-button" type="button" class="button" value="Upload Image" />
					  
					  <input id="addNewSlideButton" type="submit" name="addNewSlideButton" class="selectBox" value="Submit"/>
					</form>
				</div>
			</div>
		</div>
	</div>
						
			<div id="exam"></div>
			<div id="slideTools" style="display:none">
			<a href="#">
			<div type="button"  data-toggle="modal" class="selectBox" data-target="#SliderEditSlideModal">Edit slide</div>
			</a>
  <!-- Modal -->
			<div class="modal fade" id="SliderEditSlideModal" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Edit slide</h4>
					</div>
					<div class="modal-body">
						<form id="editSlideForm" action="" method="post">
					  <input type="text" class="inputSlide" id="slider_image_name_change" required/>Name
					 						  <br/>
						<input id="editNameSlideButton" class="selectBox" style="width:100%;text-align:center" type="submit" value="Change name"/>
					  <br/>
					  <input type="text" class="inputSlide" id="slider_image_description" name="slider_image_description"/>Caption
										  <br/>
					  <input id="editCaptionSlideButton" class="selectBox" style="width:100%;text-align:center" type="submit" value="Change caption"/>
					  <br/>
					  <input id="image-url2" class="inputSlide" type="text" name="image" required  />Image
					  <br/>
					  <input id="upload-button2" type="button" class="button" value="Upload Image" />
					  <br/>
					  <input id="editImageSlideButton" class="selectBox" style="width:100%;text-align:center" type="submit" value="Change image"/>
					  <br/>
				      
					  
						</form>
					</div>
				</div>
				<!-- Change names to have it work  -->				
				</div>
			  </div>
			  <a href="#"><div id="deleteSlide" class="selectBox">Delete slide</div></a>
		   </div>
		</div>
    </div>
		
	
	
									
									
									<!-- SLIDER CAPTION  -->	
									
									
									
									
	
	

    <div id="sliderCaptionSettings" class="tab-pane fade">
		   <div style="margin-left:50px">
			<form method="post" action="" id="imageSlidesTextStyleForm">
				<select id="sliderFontFamily"> 
					<option>Georgia</option>
					<option>Palatino Linotype</option>
					<option>Book Antiqua</option>
					<option>Times New Roman</option>
					<option>Arial</option>
					<option>Helvetica</option>
					<option>Arial Black</option>
					<option>Impact</option>
					<option>Lucida Sans Unicode</option>
					<option>Tahoma</option>
					<option>Verdana</option>
					<option>Courier New</option>
					<option>Lucida Console</option>
					<option>initial</option>
				</select>
				<input type="text" id="sliderFontSize" value="18"/>pixels
				<br/>
				<input type="checkbox" id="sliderFontWeight" value="bold" /> Bold
				<br/>
				<input type="checkbox" id="sliderFontStyle" value="italic" /> Italic
				<br/>
				<input type="color"  id="sliderTextColor" value="#000000" style="height:20px; width:30px;"/>Text color
				<br/>			
			</form>
		  </div>
    </div>
	
	
	
									
									
									<!-- SLIDER CONTROLS  -->	
									
									
									
									
    <div id="SliderChangeControls" class="tab-pane fade">
      <div style="margin-left:50px">
     			<form action="" method="post" id="sliderControlsForm">
				
				autoplay 1000 = 1 sec
				<br/>
				leave empty to stop autoplay
				<input id="autoplaySec" type="text" name="autoplaySec" value="0" />
				<br/>
				 Indicators
				 on:<input class="SliderIndicators" name="SliderIndicators" type="radio" value="carousel-indicators" />
				 off:<input class="SliderIndicators" name="SliderIndicators" type="radio" value="hidden" checked/>
				 <br/>
				 Controls
				 on:<input class="SliderControls" name="SliderControls" type="radio" value="carousel-control"/>
				 off:<input class="SliderControls" name="SliderControls" type="radio" value="hidden" checked/>
				<br/>
				Slider full width:
				 on:<input class="SliderImageFullWidth" name="SliderImageFullWidth" type="radio" value="100%" checked/>
				 off:<input class="SliderImageFullWidth" name="SliderImageFullWidth" type="radio" value="70%" />
				 <br/>
				 Select controls
				<select name="SelectSliderControls" id="SelectSliderControls">
					 <option value="none" Selected>none</option>
					 <option value="chevron">chevron</option>
					 <option value="arrow">arrow</option>
					 <option value="circle-arrow">circle-arrow</option>
					 <option value="triangle">triangle</option>
					 <option value="menu">menu</option>
					 <option value="hand">hand</option>
				</select>
				<br/>
			</form>
     </div>
	</div>
  </div>
