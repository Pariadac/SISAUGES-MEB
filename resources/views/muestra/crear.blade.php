@extends('layouts.app')

@section('content')


                <?php

                if (isset($muestra)) {
                  $datos=$muestra;
                  $murl='muestras/edita/'.$datos->id_muestra;
                  $titulo="Editar";

                }else{
                  $datos=false;
                  $murl='muestras/guardar';
                  $titulo="Agregar";
                }


                if (isset($retorno)) {
                  $alerta=1;
                  $clase=$retorno;
                }else{
                  $alerta=0;
                  $clase=0;
                }

                ?>


                <div id="mimoneda">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Muestras <small>pagina <?php echo $titulo; ?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Ubicacion:/ <label><a href="/muestras/lista">Muestras</a>/<?php echo $titulo; ?></label>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="col-md-12" id="contenido-princ">

                <div class="contenedoralertas">
                  <div id="alerta" style="display:none" class="" data-estado="<?php echo $alerta; ?>" data-clase="<?php echo $clase; ?>">
                  
                    <p><strong></strong>  <span></span></p>

                  </div>
                </div>

                <div id="trueform">
                	{!!Form::open(['url' => $murl, 'method' => 'POST','class'=>'trueformsend', 'enctype'=> "multipart/form-data"])!!}

                		<input type="hidden" value="" name="trueorigis" id="env0">
                		<input type="hidden" value="" name="truerutas" id="env1">
                		<input type="hidden" value="" name="trueactividad" id="env2">
                		<input type="hidden" value="" name="truefecharep" id="env3">
                		<input type="hidden" value="" name="truefechaana" id="env4">
                		<input type="hidden" value="" name="truetecnic" id="env5">
                		<input type="hidden" value="" name="truedescri" id="env6">
                		<input type="hidden" value="<?php echo $valor; ?>" name="truecodmues" id="env7">

                	{!! Form::close() !!}
                </div>

                <!--<div class="pasos-registro">
                    <div class="col-md-2">
                        <h4>Paso:/</h4>
                    </div>

                    <div class="col-md-8">
                        <div class="alinear">
                            <div class="paso">
                                <span>1</span>
                            </div>
                            <div class="separador">
                            </div>
                            <div class="paso activado">
                                <span>2</span>
                            </div>
                        </div>
                    </div>
                </div>-->


                <div class="validadorformularios ">
                      
                  {!!Form::open(['url' => $murl, 'method' => 'POST','class'=>'form-horizontal muestraform', 'data-valid'=>'encontrado', 'enctype'=> "multipart/form-data"])!!}


                      <fieldset>
                        <div class="panel panel-default">
                        <div class="panel-body">
                          <div class="col-md-6">

                              <div class="col-md-12 botones-principal">
                                <button type="button" class="btn btn-primary" id="imagenescarga">Muestra *</button>
                              </div>

                              <div <?php if($datos){echo 'style="display:block"';} ?> id="contenedordatos" data-insp="visible" data-compro="0">

                              	<div class="botn col-md-12">
                                    <input id="filebutton" name="filebutton[]" <?php if(!$datos){echo "multiple";} ?> class="input-file  <?php if (!$datos) {echo 'camporequerido';} ?> " type="file">

                                    <input class="res1" name="rutamuestra" id="rutamuestra" value="<?php if ($datos) {echo ';'. $ruta_aux;} ?>" type="hidden">
                                    <input class="res0" name="rutamuestra2" id="rutamuestra2" value="<?php if ($datos) {echo ';'.$datos->ruta_img_muestra;} ?>" type="hidden">

                                    <div class="col-md-12 imgcargada" <?php if ($datos) {echo 'style="display:block!important;"';} ?>>
                                        <div class="alineador">
                                            <img src="<?php if ($datos) {echo url('/storage').'/'.$ruta_aux;} ?>" id="thumbnil">
                                        </div>
                                    </div>                    

                                </div>

                                <div class="col-md-12" id="miniaturas-padre">
                                		
                                  <div class="col-md-12" id="miniaturas">
                                  	
                                  </div>

                                </div>

                              </div>

            								  <div id="contenedorcarga" <?php if($datos){echo 'style="display:hidden"';} ?>>
            								  		<div class="col-md-12">
            								  			<img src="{{url('assets/complementos/carga.gif') }}">
            								  		</div>
            								  </div>

                          </div> 

                          <div class="col-md-6">
                            

                            <div class="row">
                            
                              <div class="col-md-6">
                                

                                <div class="form-group ">
                                  <label class="control-label" id="etiquetarequerida-1" for="textinput">Tipo de Atividad *</label>  
                                  <div class="col-md-12">

                                  <select class="my_select_box chosen-select res2 camporequerido" name="tipo_actividad_fin" data-etiqueta="1">
                                  		
                                  		<option value="">Seleccione una Actividad</option>

                                  		<?php                                     


                                           foreach ($actividad as $key) {
	                                          if ($datos) {
	                                              if ($actividad_muestr[0]->id_actividad==$key->id_actividad) {
	                                                echo '<option selected value="'.$key->id_actividad.'">'.$key->nombre_actividad.'</option>';
	                                              }else{
	                                                echo '<option value="'.$key->id_actividad.'">'.$key->nombre_actividad.'</option>';
	                                              }
	                                          }else{
	                                            echo '<option value="'.$key->id_actividad.'">'.$key->nombre_actividad.'</option>';
	                                          }
	                                        }

                                       ?>

                                  </select>


                                    <!--<input autocomplete="off" type="text" id="lock1" name="tipo_actividad" class="form-control mi-chosen-dos camporequerido" data-location="1" data-valr="" placeholder="Actividad">
                                    <input name="tipo_actividad_fin" id="finact" type="hidden" value="">
                                    <ul class="oculto1" id="location1">
                                        <?php                                     

                                          foreach ($actividad as $value):

                                              echo '<li class="referencias" data-ids2="'.$value->id_actividad.'" data-ids="1" data-value="'.$value->nombre_actividad.'" data-valortx="'.$value->nombre_actividad.'" > <p class="miminibuscador" >'.$value->nombre_actividad.'</p> </li>';

                                           endforeach 

                                       ?>
                                    </ul>-->


                                  </div>
                                </div>

                              </div>


                              <div class="col-md-12 detalles-actividad">
                                
                              <div class="enfatizador"> 
                                <h4>Detalles</h4>

                                <div class="row">
                                    <div class="col-md-6"><label>Estatus de la Actividad</label></div>
                                    <div class="col-md-6"><p><label>Sector de la Actividad</label></p></div>
                                    <div class="col-md-6 estatusact"><div class="col-md-12"><p><br></p></div></div>
                                    <div class="col-md-6 sectact"><div class="col-md-12"><p><br></p></div></div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12"><p><label>Representante de la Actividad</label></p></div>
                                    <div class="col-md-12"><div class="col-md-6">Nombre:<span class="reprenom"></span></div><div class="col-md-6">Cedula:<span class="repreci"></span></div></div>
                                </div> 

                              </div>


                              </div>


                              <div class="col-md-6">


                                  <div class="form-group ">
                                    <label class="control-label" for="textinput" id="etiquetarequerida-2">Fecha de Recepcion *</label>  
                                    <div class="col-md-12">
                                    <input id="fecha_recepcion" name="fecha_recepcion" type="text" data-etiqueta="2" placeholder="placeholder" value="<?php if ($datos) {echo $datos->fecha_recepcion;} ?>" class="form-control camporequerido res3"> 
                                    </div>
                                  </div>




                                  

                              </div>

                              <div class="col-md-6">
                                      
                                  <div class="form-group ">
                                    <label class="control-label" for="textinput" id="etiquetarequerida-3">Fecha de Analisis *</label>  
                                    <div class="col-md-12">
                                    <input id="fecha_analisis" name="fecha_analisis" type="text" data-etiqueta="3" placeholder="placeholder" value="<?php if ($datos) {echo $datos->fecha_analisis;} ?>" class="form-control camporequerido res4"> 
                                    </div>
                                  </div>


                                  <div class="form-group ">
                                    <label class="control-label" for="textinput" id="etiquetarequerida-4">Tecnica de Estudio *</label>  
                                    <div class="col-md-12">
                                    <select class="my_select_box chosen-select res5 camporequerido" data-etiqueta="4" data-placeholder="Select Your Options" id="tipo_muestra" name="tipo_muestra" data-value="<?php if ($datos) {echo $datos->tipo_muestra;} ?>">
                                      <option value="">Seleccione Tecnica...</option>
                                      <?php


                                        foreach ($tecnica as $key) {
                                          if ($datos) {
                                              if ($tecnica_estudio_mues[0]->id_tecnica_estudio==$key->id_tecnica_estudio) {
                                                echo '<option selected value="'.$key->id_tecnica_estudio.'">'.$key->descripcion_tecnica_estudio.'</option>';
                                              }else{
                                                echo '<option value="'.$key->id_tecnica_estudio.'">'.$key->descripcion_tecnica_estudio.'</option>';
                                              }
                                          }else{
                                            echo '<option value="'.$key->id_tecnica_estudio.'">'.$key->descripcion_tecnica_estudio.'</option>';
                                          }
                                        }


                                      ?>
                                    </select> 
                                    </div>
                                  </div>



                              </div>


                              <div class="col-md-12">
                                
                                <!-- Textarea -->
                                <div class="form-group">
                                  <label class="control-label" for="textarea" id="etiquetarequerida-5">Descripccion de la muestra *</label>
                                  <div class="col-md-12">                     
                                    <textarea class="form-control camporequerido res6" id="textarea" data-etiqueta="5" name="textarea"><?php if ($datos) {echo $datos->descripcion_muestra;} ?></textarea>
                                  </div>
                                </div>

                                <div class="col-md-12 msnrequeridos">
                                    <p>Todos los campos con (*) son obligatorios</p>
                                </div>

                              </div>


                            </div>


                          </div>

                        </div>
                        </div>
                          <!-- Button -->
                          <div class="form-group">

                              <div class="col-md-12 botones-principal">

                                  <button id="singlebutton" name="singlebutton" class="btn btn-success">Terminar</button>

                              </div>
                          </div>


                      </fieldset>

                  {!! Form::close() !!}

                </div>


                </div>


@endsection
