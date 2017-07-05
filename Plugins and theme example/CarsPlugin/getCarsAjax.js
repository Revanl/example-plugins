jQuery(document).ready( function($){
	$('#filterCars').click(function(){
		event.preventDefault();
		var selectedBrand = $('.carsBrand').val();
		var selectedModel = $('.carsModel').val();
		var selectedEngine = $('.carsEngine').val();
		var selectedColor = $('.carsColor').val();
		var selectedPrice = $('.carsPrice').val();
		$.ajax({
			type: "POST",
			url: getCarsAjax.ajax_url,
			data:{
				action:"carsFilter",
				selectedBrand:selectedBrand,
				selectedModel:selectedModel,
				selectedEngine:selectedEngine,
				selectedColor:selectedColor,
				selectedPrice:selectedPrice
			},
			success: function (response){
				$("#carsFilter").replaceWith(response);
				$.ajax({
					type: "POST",
					url: getCarsAjax.ajax_url,
					data:{
						action:"carsFound"
					},
					success: function (response){
						$("#carsFound").replaceWith(response);
					},
					error: function(jqXHR, textStatus, errorThrown){
						alert("error");
					}
				})
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert("error");
			}
		})
	})
	$('#carsBrand').change(function(){
		var selectedBrand = $('#carsBrand').val();
		$.ajax({
			type: "POST",
			url: getCarsAjax.ajax_url,
			data:{
				action:"getBrandModels",
				selectedBrand:selectedBrand
			},
			success: function (response){
				$("#carsModel").replaceWith(response);
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert("error");
			}
		})
	})
	$('.carsBrand').change(function(){
		var selectedBrand = $('.carsBrand').val();
		$.ajax({
			type: "POST",
			url: getCarsAjax.ajax_url,
			data:{
				action:"getBrandModels",
				selectedBrand:selectedBrand
			},
			success: function (response){
				$(".carsModel").replaceWith(response);
			},
			error: function(jqXHR, textStatus, errorThrown){
				alert("error");
			}
		})
	})
	$('#registerSubmit').click(function(){
		event.preventDefault();
		var form = $('#registerForm').serialize();
		var registerName = $('#registerName').val();
		var registerPassword = $('#registerPassword').val();	
		$.ajax({
			type: "POST",
			url: getCarsAjax.ajax_url,
			data:{
				action:"register",
				registerName:registerName,
				registerPassword:registerPassword
			},
			success: function(response){
				alert(response);
				$("#registerForm")[0].reset();
			}
		})
	})
	$('#loginSubmit').click(function(){
		event.preventDefault();
		var form = $('#loginForm').serialize();
		var loginName = $('#loginName').val();		
		var loginPassword = $('#loginPassword').val();		
		$.ajax({
			type: "POST",
			url: getCarsAjax.ajax_url,
			data:{
				action:"login",
				loginName:loginName,
				loginPassword:loginPassword
			},
			success: function(response){
				if(response==true){
					window.location.reload();
				}else{
				alert(response);
				 $("#loginForm")[0].reset();
				}
			}
		})
	})	
})
