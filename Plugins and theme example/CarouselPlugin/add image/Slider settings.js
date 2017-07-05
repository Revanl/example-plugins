
//	$(this).children("div:first").css("display","block");
jQuery(document).ready(function($){

	$(".SliderButton").click(function(){
		$(this).next().addClass("applyModal");
	})
	$(".close").click(function(){
		$(".modal").removeClass("applyModal");
	})
	$(".subSliderButton").click(function(){
		$(this).next().addClass("applyModal");
	})
	$(".subclose").click(function(){
		$("#SliderAddSlideModal").removeClass("applyModal");
	})
	$(".subclose2").click(function(){
		$("#SliderRenameSlideModal").removeClass("applyModal");
	})
})



