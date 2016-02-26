$(document).ready(function(){


	$('#ocultar_escr').on('click',function(event){
		event.preventDefault();

		$('#wrapper').attr('style',"padding:0px!important");
		$('#page-wrapper').attr('style',"padding-left:45px!important");
		$('#eltraslado').fadeOut(function(){
			$('#eltraslado2').fadeIn();
		});

	});

	$('#eltraslado2').on('click',function(event){
		event.preventDefault();

		
		$('#eltraslado2').fadeOut(function(){
			$('#eltraslado').fadeIn();
			$('#wrapper').attr('style',"");
			$('#page-wrapper').attr('style',"");
		});

	});


	$('#imagenescarga').on('click',function(event){
		event.preventDefault();
		$('#filebutton').click();
	});


	function showMyImage(fileInput) {

        var files = fileInput[0].files;
        for (var i = 0; i < files.length; i++) {           
            var file = files[i];
            var imageType = /image.*/;     
            if (!file.type.match(imageType)) {
                continue;
            }           
            var img=document.getElementById("thumbnil");       
            img.file = file;    
            var reader = new FileReader();
            reader.onload = (function(aImg) { 
                return function(e) { 
                    aImg.src = e.target.result; 
                }; 
            })(img);
            reader.readAsDataURL(file);
        }    
    }



	$('#filebutton').on('change',function(){

		var form=$('.muestraform');
		var data=new FormData(form[0]);
		var url=form.attr('action').replace('guardar','ajaxvalidar');

		$.ajax({
		    url: url, 
		    type: "POST",             
		    data: data,
		    contentType: false,
		    dataType: "json",       
		    cache: false,             
		    processData:false, 
		    success: function(data) {

		    	$('#thumbnil').attr('src',data.ruta);
		    	$('.imgcargada').fadeIn();
		    	$('#rutamuestra').val($('#thumbnil').attr('src'));

		    }
		});

	});


	$('#boton-inst').on('click',function(event){

		event.preventDefault();

		var form=$('.busqueda-inst');
		var data=form.serialize();
		var url=form.attr('action');

		$.ajax({
		    url: url, 
		    type: "POST",             
		    data: data,      
		    cache: false,              
		    success: function(data) {

		    	$('.borrables').remove();

		    	$('.table').append(data);

		    }
		});

	})


})