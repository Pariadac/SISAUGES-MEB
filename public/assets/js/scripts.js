$(document).ready(function(){


	var fecha=new Date();


	$('.buscador-muest').on('click',function(){

		$('.busquedas').submit();

	});


	$('.mi-chosen').on('keyup',function(event){

    	event.preventDefault();
    	var llave=$(this).data('location');
    	if ($(this).val().length>=2) {

    		var form=$('.busquedas');
			var urls=form.attr('action');

			urls=urls.split('/');

    		urls=urls[0]+'/'+urls[1]+'/'+urls[2]+'/muestras/buscar';


			var moneda=$('#mimoneda input').val();


    		$('#location'+llave).attr('class','buscadores');

        	$.ajax({
	            url:urls,
	            cache: false,
	            data:{'valor':$(this).val(),'_token':moneda,'bus':llave},
	            type:"POST",
	            dataType: "json",
	            success: function(data) {
	            	$('#location'+llave).empty();
		            $('#location'+llave).append(data.resultado);

	            }
	            
	        });

    	}else{
    		$('#location'+llave).attr('class','oculto1');
    	}


    });



    $('.mi-chosen-dos').on('keyup',function(event){

    	event.preventDefault();
    	var llave=$(this).data('location');
    	var str1=$(this).val().toUpperCase();
    	if ($(this).val().length>=1) {

    		$('#location'+llave).attr('class','buscadores');

    		$('.referencias').each(function(){

    			var str2=$(this).data('valortx').toUpperCase();

    			if (str2.search(str1)==-1) {
    				$(this).attr('style',"display:none;");
    			}else{
    				$(this).attr('style',"display:block;");
    			}

    		});

    	}else{
    		$('#location'+llave).attr('class','oculto1');
    	}


    });


    function busca_relaciones_actividad(){

    	var form=$('.muestraform');
		var urls=form.attr('action');
		var buscador=$('#lock1').data('valr');

		urls=urls.split('/');

    	urls=urls[0]+'/'+urls[1]+'/'+urls[2]+'/muestras/ajaxrelacionesact';

		var moneda=$('#mimoneda input').val();

    	$.ajax({
            url:urls,
            cache: false,
            data:{'_token':moneda,'bus':buscador},
            type:"POST",
            dataType: "json",
            success: function(data) {
            	$('.estatusact p').text(data.act);
            	$('.sectact p').text(data.sect);
            	$('.repreci').text(data.cirepre);
            	$('.reprenom').text(data.nomrepre);
            }
            
        });
    }


    $('.oculto1').on('click','li',function(event){
		event.preventDefault();

		

		var llave=$(this).data('ids');
		var nameact=$('#lock'+llave).attr('name');

			$('#lock'+llave).val($(this).data('valortx'));
			$('#lock'+llave).attr('data-valores',$(this).data('value'));
			$('#location'+llave).attr('class','oculto1');

			if (nameact.search('tipo_actividad')>-1) {

				$('#lock'+llave).attr('data-valr',($(this).data('ids')));
				$('#finact').attr('value',$('#lock1').data('valr'));

				busca_relaciones_actividad();
			};


	})



	function validarEmail( email ) {
	    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	    if ( !expr.test(email) ){
	    	return 1;
	    }else{
	    	return 0;
	    }
	        
	}

	$('.solomails').on('change',function(){

		var retorno=validarEmail($(this).val());

		if (retorno==1) {
			$(this).attr('style','border-color:red;');
		}else{
			$(this).attr('style','');
		}

	});

	$('.solo-numero').keyup(function (){
	    this.value = (this.value + '').replace(/[^0-9]/g, '');
	});



	$('.alfanumericos').keyup(function (){

		var vsCadena = $(this).val().toString();

        if (vsCadena.match(/[^0-9A-Za-z]/g)) {
        	vsCadena=vsCadena.replace(/[^0-9A-Za-z]/g, '')
        };

        $(this).val(vsCadena);

	});


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
			$('#alerta').fadeIn(function(){
				setTimeout(function(){$('#alerta').fadeOut();},3000);
			});


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

	
	$('#inicio_mues_bus').datetimepicker({
	  format:'d-m-Y',
	  timepicker:false,
	  maxDate:fecha,
	});

	$('#fin_mues_bus').datetimepicker({
	  format:'d-m-Y',
	  timepicker:false,
	  maxDate:fecha,
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
    	var url=form.attr('action');

    	url=url.split('/');

    	url=url[0]+'/'+url[1]+'/'+url[2]+'/muestras/ajaxborrarimg';


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



    function borrar_img_iniciado(){
    	var x=document.getElementById("imgconttemp");
    	var y=document.getElementById("rutamuestra");

    	if (x||y) {
    		borrar_img();
    	};
    }

    setTimeout(borrar_img_iniciado(),5000);


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

			var url=form.attr('action');

			url=url.split('/');

    		url=url[0]+'/'+url[1]+'/'+url[2]+'/muestras/ajaxvalidar';

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



	$('#singlebutton').on('click',function(event){
		event.preventDefault();

		var formulario=$('.validadorformularios form .camporequerido');
		var error=0;

		formulario.each(function(){

			if ($(this).val()=="") {
				error++;

				$(this).attr('style','border-color:red;');

				if ($(this).attr('type')=='file') {

					$('#imagenescarga').attr('style','border-color:red;');

				};

			}else{

				$(this).attr('style','');

				if ($(this).attr('type')=='file') {

					$('#imagenescarga').attr('style','');
					
				};

			}

		});

		if (error!=0) {
			
			$('#alerta').attr('class','alert alert-danger');
			$('#alerta strong').text('Error');
			$('#alerta span').text('Complete los campos obligatorios');
			$('#alerta').fadeIn(function(){
				setTimeout(function(){$('#alerta').fadeOut();},3000);
			});

		}else{
			$('.validadorformularios form').submit();
		}

	});


	$('.formulariosajax form').on('submit',function(event){

		event.preventDefault();

		$('#boton-inst').click();


	});



})