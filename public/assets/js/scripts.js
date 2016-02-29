$(document).ready(function(){


	var fecha=new Date();


	function alertaprincipal(){
		var tipo=parseInt($('#alerta').data('estado'));
		var clase=parseInt($('#alerta').data('clase'));
		var str="";

		if (tipo==1) {
			if (clase==0) {
				str='alert alert-success';
				$('#alerta strong').text('Bien hecho');
				$('#alerta span').text('Operacion realizada con Exito');
			};
			if(clase==1){
				str='alert alert-danger';
				$('#alerta strong').text('Error');
				$('#alerta span').text('La operacion a fallado, intente nuevamente');
			};

			$('#alerta').attr('class',str);
			$('#alerta').fadeIn();


		};

	};

	alertaprincipal();



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

	

	$('#fecha_analisis').datetimepicker({
	  format:'d-m-Y',
	  timepicker:false,
	  maxDate:fecha,
	});


	$('#fecha_recepcion').datetimepicker({
	  format:'d-m-Y',
	  timepicker:false,
	  maxDate:fecha,
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



    function borrar_img(){

		var form=$('.muestraform');
    	var url=form.attr('action').replace('guardar','ajaxborrarimg');	
    	var data=new FormData(form[0]);

    	$.ajax({
		    url: url, 
		    type: "POST",             
		    data: data,
		    contentType: false,
		    dataType: "json",       
		    cache: false,             
		    processData:false, 
		    success: function(data) {


		    }
		});

    }



	$('#filebutton').on('change',function(){

		var form=$('.muestraform');
		var data=new FormData(form[0]);
		var errores=0;

		var extpermitidas=new Array('jpeg','tiff','png','gif','bmp');

		for (var i = 0; i < extpermitidas.length; i++) {
			if ($('#filebutton')[0].files[0].type!='image/'+extpermitidas[i]) {
				errores++;
			};
		};

		if (errores<extpermitidas.length) {
			errores=0;
		};

		if ($('#filebutton')[0].files[0].size >5000000) {
			errores++;
		}


		if (errores==0)
		{

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

			    	
			    	if (data.tama<1000000) {
			    		var mytama=data.tama / 1000;
			    		var ext='KB';
			    	}else{
			    		var mytama=data.tama / 1000000;
			    		var ext='MB';
			    	}
 
			    	$('#imgnom').empty();
			    	$('#imgnom').append(data.orgnl);

			    	$('#imgtama').empty();
			    	$('#imgtama').append(mytama.toFixed(2)+ext);

			    	setTimeout(borrar_img(),2000);


			    }
			});
		}

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