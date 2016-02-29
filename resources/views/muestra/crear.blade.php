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


                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Muestras <small>pagina principal</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Muestras/<?php echo $titulo; ?></label>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="col-md-12" id="contenido-princ">

                <div id="alerta" style="display:none" class="" data-estado="<?php echo $alerta; ?>" data-clase="<?php echo $clase; ?>">
                  
                  <p><strong></strong> <span></span></p>

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



                    
                {!!Form::open(['url' => $murl, 'method' => 'POST','class'=>'form-horizontal muestraform', 'enctype'=> "multipart/form-data"])!!}


                    <fieldset>

                        <div class="col-md-4">

                                <div class="botn col-md-12">


                                    <div class="col-md-12 botones-principal">
                                      <button type="button" class="btn btn-primary" id="imagenescarga">Muestra *</button>
                                    </div>

                                    <input id="filebutton" style="display:none" name="filebutton" class="input-file" type="file">

                                    <input name="rutamuestra" id="rutamuestra" type="hidden">

                                    <div class="col-md-12 imgcargada" <?php if ($datos) {echo 'style="display:block!important;"';} ?>>
                                        <div class="alineador">
                                            <img src="<?php if ($datos) {echo $datos->ruta_img_muestra;} ?>" id="thumbnil">
                                        </div>
                                    </div>                    

                                </div>
                                <div class="col-md-12 datosimg">
                                    <div class="enfatizador">
                                      <div class="row">
                                        <div class="col-md-12"><p><label>Nombre:</label> <span id="imgnom"></span></p></div>
                                        <div class="col-md-12"><p><label>Tamaño:</label> <span id="imgtama"></span></p></div>
                                    </div>
                                    </div>
                                </div>

                        </div> 

                        <div class="col-md-8">
                          

                          <div class="row">
                          
                            <div class="col-md-6">
                              

                              <div class="form-group ">
                                <label class="control-label" for="textinput">Tipo de Atividad *</label>  
                                <div class="col-md-12">
                                <select id="tipo_actividad" name="tipo_actividad" data-value="<?php if ($datos) {} ?>" class="form-control">
                                  
                                  <option>uno</option>
                                
                                </select>
                                </div>
                              </div>

                            </div>


                            <div class="col-md-12 detalles-actividad">
                              
                            <div class="enfatizador"> 
                              <h4>Detalles</h4>

                              <div class="row">
                                  <div class="col-md-4"><p>1</p></div>
                                  <div class="col-md-4"><p>2</p></div>
                                  <div class="col-md-4"><p>3</p></div>
                              </div>

                              <div class="row">
                                  <div class="col-md-4"><p>4</p></div>
                                  <div class="col-md-4"><p>5</p></div>
                                  <div class="col-md-4"><p>6</p></div>
                              </div>

                            </div>


                            </div>


                            <div class="col-md-6">


                                <div class="form-group ">
                                  <label class="control-label" for="textinput">Fecha de Recepcion *</label>  
                                  <div class="col-md-12">
                                  <input id="fecha_recepcion" name="fecha_recepcion" type="text" placeholder="placeholder" value="<?php if ($datos) {echo $datos->fecha_recepcion;} ?>" class="form-control"> 
                                  </div>
                                </div>



                                <!-- Text input-->
                                <div class="form-group ">
                                  <label class="control-label" for="textinput">Codigo de La muestra *</label>  
                                  <div class="col-md-12">
                                  <input id="textinput" name="textinput" type="text" placeholder="Codigo" value="<?php if ($datos) {} ?>" class="form-control"> 
                                  </div>
                                </div>


                                

                            </div>

                            <div class="col-md-6">
                                    
                                <div class="form-group ">
                                  <label class="control-label" for="textinput">Fecha de Analisis *</label>  
                                  <div class="col-md-12">
                                  <input id="fecha_analisis" name="fecha_analisis" type="text" placeholder="placeholder" value="<?php if ($datos) {echo $datos->fecha_analisis;} ?>" class="form-control"> 
                                  </div>
                                </div>


                                <div class="form-group ">
                                  <label class="control-label" for="textinput">Tecnica de Estudio *</label>  
                                  <div class="col-md-12">
                                  <select id="tipo_muestra" name="tipo_muestra" data-value="<?php if ($datos) {echo $datos->tipo_muestra;} ?>" class="form-control">
                                    <option value="">Seleccione Tecnica...</option>
                                    <?php


                                      foreach ($tecnica as $key) {
                                        echo '<option value="'.$key->id_tecnica_estudio.'">'.$key->descripcion_tecnica_estudio.'</option>';
                                      }


                                    ?>
                                  </select> 
                                  </div>
                                </div>



                                

                                



                            </div>


                            <div class="col-md-12">
                              
                              <!-- Textarea -->
                              <div class="form-group">
                                <label class="control-label" for="textarea">Descripccion de la muestra *</label>
                                <div class="col-md-12">                     
                                  <textarea class="form-control" id="textarea" name="textarea"><?php if ($datos) {echo $datos->descripcion_muestra;} ?></textarea>
                                </div>
                              </div>

                              <div class="col-md-12 msnrequeridos">
                                  <p>Todos los campos con (*) son obligatorios</p>
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


@endsection
