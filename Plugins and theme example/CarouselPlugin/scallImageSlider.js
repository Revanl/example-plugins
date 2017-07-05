(function() {
    tinymce.PluginManager.add('ImageSlider', function( editor, url ) {

	
function openContainerForSlider() {
	jQuery(document).ready( function($) {
/* Get from elements values */

		$.ajax({
			url: sliderButton.ajax_url,
			type: "POST",
			data: {
				action:"GetPostDetails"
			},
			success: function (response){
				// you will get response from your php page (what you echo or print)                 
				$('.mce-window-body').html(response);
			},
			error: function(jqXHR, textStatus, errorThrown){
			   alert("error");
			},
			complete:function(){
				
	
							//SELECT
								$(".imageNameLoader").change(function(e){
								var selectSlide = $('#selectSlide').val();

								var selectedSlideId = $('#selectSlide').children(":selected").attr("id");
									$.ajax({
										type: "POST",
										url: sliderButton.ajax_url,
										data:{
											action : 'selectSlide',
											selectSlide : selectSlide,	
											selectedSlideId : selectedSlideId
										},
										success: function(response){

										if( response == false){
											$('#slideTools').css('display','none');
											}else{											
											$('#slideTools').css('display','block');				
											}
										},
										error: function(response){
											alert(response);
										}
									})
								})
								//DECREMENT
									$("#slideDecrement").click(function(e){
										e.preventDefault();
										$.ajax({
											type: "POST",
											url: sliderButton.ajax_url,
											data:{
												action: 'slideDecrement',				
											},
											success: function(response){
												$.ajax({
													type: "GET",
													url: sliderButton.ajax_url,
													data:{
														action : 'refresh'
													},
													success: function(response){
														$('.imageNameLoader').html(response);
													}
												})
											}
										})

									})
									//INCREMENT
									$("#slideIncrement").click(function(e){
										e.preventDefault();
										$.ajax({
											type: "POST",
											url: sliderButton.ajax_url,
											data:{
												action: 'slideIncrement',				
											},
											success: function(response){
												$.ajax({
													type: "GET",
													url: sliderButton.ajax_url,
													data:{
														action : 'refresh'
													},
													success: function(response){
														$('.imageNameLoader').html(response);
													}
												})
											}
										})
									})
									
								//ADD
									$("#addNewSlideButton").click(function(e){
										e.preventDefault();
										var inputs = $('#addNewSlideForm').serialize();
										var slider_image_name = $('#slider_image_name').val();
										var imageurl = $('#image-url').val();
										var slider_image_description = $('#slider_image_description').val();
										$.ajax({
											type: "POST",
											url: sliderButton.ajax_url,
											data:{
											action : 'insert',
											inputs : inputs,
											slider_image_name:slider_image_name,
											imageurl:imageurl,
											slider_image_description:slider_image_description
											},
											success: function(response){
												$("#addNewSlideForm")[0].reset();
												$.ajax({
													type: "GET",
													url: sliderButton.ajax_url,
													data:{
														action : 'refresh'
													},
													success: function(response){
														$('.imageNameLoader').html(response);
													}
												})
											},
												error: function(response){
												alert(response);
											}
										})

									})
								//DELETE
									$("#deleteSlide").click(function(e){
										e.preventDefault();
										$.ajax({
											type: "POST",
											url: sliderButton.ajax_url,
											data:{
											action: 'deleteSlide'
											},
											success: function(response){
												alert("slide deleted");
												$.ajax({
													type: "GET",
													url: sliderButton.ajax_url,
													data:{
														action : 'refresh'
													},
													success: function(response){
														$('.imageNameLoader').html(response);
													}
												})
											},
											error: function(response){
												alert('error');
												alert(response);
											}
										})

									})
								//EDIT Name
									$('#editNameSlideButton').click(function(e){
										e.preventDefault();
										
										var slider_image_name_change = $('#slider_image_name_change').val();
										$.ajax({
											type: "POST",
											url: sliderButton.ajax_url,
											data:{
												action: 'renameSlide',
												slider_image_name_change:slider_image_name_change
											},
											success: function(response){												
												alert("slide name changed");
												$.ajax({
													type: "GET",
													url: sliderButton.ajax_url,
													data:{
														action : 'refresh'
													},
													success: function(response){
														$('.imageNameLoader').html(response);
													}
												})
											},
											error: function(response){
											alert(response);
											}
										})
									})
									//EDIT Caption
									$('#editCaptionSlideButton').click(function(e){
										e.preventDefault();
										var editSlideForm = $('#editSlideForm').serialize();
										var slider_image_description_change = $('#slider_image_description_change').val();
										$.ajax({
											type: "POST",
											url: sliderButton.ajax_url,
											data:{
												action: 'editCaptionSlide',
												editSlideForm:editSlideForm,
												slider_image_description_change:slider_image_description_change
											},
											success: function(response){
												
												alert("slide caption changed");
												$.ajax({
													type: "GET",
													url: sliderButton.ajax_url,
													data:{
														action : 'refresh'
													},
													success: function(response){
														$('.imageNameLoader').html(response);
													}
												})
											},
											error: function(response){
												alert(response);
											}
										})
									})
									//EDIT IMAGE
									$('#editImageSlideButton').click(function(e){
										e.preventDefault();
										var editSlideForm = $('#editSlideForm').serialize();
										var imageurl2 = $('#image-url2').val();
										$.ajax({
											type: "POST",
											url: sliderButton.ajax_url,
											data:{
												action: 'editImageurl2Slide',
												editSlideForm:editSlideForm,
												imageurl2:imageurl2
											},
											success: function(response){												
												
												alert("slide image changed");
												$.ajax({
													type: "GET",
													url: sliderButton.ajax_url,
													data:{
														action : 'refresh'
													},
													success: function(response){
														$('.imageNameLoader').html(response);
													}
												})
											},
											error: function(response){
												alert(response);
											}
										})
									})
								
							}
		});
	});	
}
			
function submitSlider(){
	var sliderName = $('#sliderName').val();
	var selectImgShape = $('#selectImgShape').val();
	var sliderImgHeight = $('#sliderImgHeight').val();
	var SliderImageHeightUnit = $('#SliderImageHeightUnit').val();
	var sliderImgWidth = $('#sliderImgWidth').val();
	var SliderImageWidthUnit = $('#SliderImageWidthUnit').val();
	var sliderFontFamily = $("#sliderFontFamily").val();
	var sliderFontSize = $("#sliderFontSize").val();
	var sliderFontWeight = $("#sliderFontWeight").val();
	var sliderFontStyle = $("#sliderFontStyle").val();
	var sliderTextColor = $("#sliderTextColor").val();
	var autoplaySec = $("#autoplaySec").val();
	var SliderIndicators = $(".SliderIndicators:checked").val();
	var SliderControls = $(".SliderControls:checked").val();
	var SelectSliderControls = $("#SelectSliderControls").val();
	var SliderImageFullWidth = $(".SliderImageFullWidth:checked").val();
		$.ajax({
			type: "POST",
			url: sliderButton.ajax_url,
			data:{
				action:'convertArray',
				sliderName:sliderName,
				selectImgShape:selectImgShape,
				sliderImgHeight:sliderImgHeight,
				SliderImageHeightUnit:SliderImageHeightUnit,
				sliderImgWidth:sliderImgWidth,
				SliderImageWidthUnit:SliderImageWidthUnit,
				autoplaySec:autoplaySec,
				SliderIndicators:SliderIndicators,
				SliderControls:SliderControls,
				SelectSliderControls:SelectSliderControls,
				SliderImageFullWidth:SliderImageFullWidth,
				sliderFontFamily:sliderFontFamily,
				sliderFontSize:sliderFontSize,
				sliderFontWeight:sliderFontWeight,
				sliderFontStyle:sliderFontStyle,
				sliderTextColor:sliderTextColor
			},
			success: function(response){											
			editor.insertContent('[Carousel file="wp-content/plugins/GoatCarousel/Carousel.php" '+ response +']');

			},
			error: function(response){
			alert('failedf');
			}
		})
}
function deleteSlider(){
	$.ajax({
		type: "POST",
		url: sliderButton.ajax_url,
		data:{
			action: 'deleteSlider'
		}
	})
}
//#mceu_81 > button > span
editor.addButton( 'ImageSlider', {
	text: "Image slider", // title of the button
	onclick: function(){
		editor.windowManager.open({
			title: 'Image slider',
			verify_html: false,
			width:800,
			height:450,
			body:[	
				openContainerForSlider()
			],
			onSubmit: function(e) {
				submitSlider()
			},
			onRemove: function(e){				
				deleteSlider()
			}
			
		})
	}
});
});
})(); 