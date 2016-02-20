@extends('layouts.app')

@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Muestras <small>pagina principal</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Muestras/Agregar</label>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="col-md-12" id="contenido-princ">

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

                    
                {!!Form::open(['url' => ['muestras/guardar'], 'method' => 'POST','class'=>'form-horizontal muestraform', 'enctype'=> "multipart/form-data"])!!}


                    <fieldset>

                        <div class="col-md-12">
                          <div>
                            <div class="panel-body">

                              <!-- Standar Form -->
                                <div class="form-group">

                                    <button type="button" class="btn btn-primary" id="imagenescarga">Cargar Muestra</button>

                                    <input id="filebutton" style="display:none" name="filebutton" class="input-file" type="file">

                                    <div class="col-md-12">
                                        
                                    </div>

                                    <div class="col-md-12 imgcargada">
                                        <div class="alineador">
                                            <img src="" id="thumbnil">
                                        </div>
                                    </div>

                                </div>


                            </div>
                          </div>
                        </div> 

                        <div class="col-md-12">
                            <!-- Text input-->
                            <div class="form-group ">
                              <label class="control-label" for="textinput">Codigo de La muestra</label>  
                              <div class="col-md-12">
                              <input id="textinput" name="textinput" type="text" placeholder="placeholder" class="form-control"> 
                              </div>
                            </div>


                            <div class="form-group ">
                              <label class="control-label" for="textinput">Fecha de Recepcion</label>  
                              <div class="col-md-12">
                              <input id="fecha_recepcion" name="fecha_recepcion" type="text" placeholder="placeholder" class="form-control"> 
                              </div>
                            </div>

                            <div class="form-group ">
                              <label class="control-label" for="textinput">Fecha de Analisis</label>  
                              <div class="col-md-12">
                              <input id="fecha_recepcion" name="fecha_analisis" type="text" placeholder="placeholder" class="form-control"> 
                              </div>
                            </div>


                            <!-- Button Drop Down -->
                            <div class="form-group">
                              <label class="control-label" for="buttondropdown">Tipo de Muestra</label>
                              <div class="col-md-12">
                                <div class="input-group">
                                  <input id="buttondropdown" name="tip_mues" class="form-control" placeholder="placeholder" type="text">
                                  <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                      Action
                                      <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                      <li><a href="#">TIPO 1</a></li>
                                      <li><a href="#">TIPO 2</a></li>
                                      <li><a href="#">TIPO 3</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <!-- Textarea -->
                            <div class="form-group">
                              <label class="control-label" for="textarea">Descripccion de la muestra</label>
                              <div class="col-md-12">                     
                                <textarea class="form-control" id="textarea" name="textarea">Lorem</textarea>
                              </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                                
                                <!-- Button Drop Down -->
                            <div class="form-group">
                              <label class="control-label" for="buttondropdown">Tipo de Atividad</label>
                              <div class="col-md-12">
                                <div class="input-group">
                                  <input id="buttondropdown" name="tip_act" class="form-control" placeholder="placeholder" type="text">
                                  <div class="input-group-btn">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                      Action
                                      <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                      <li><a href="#">ACTIVIDAD 1</a></li>
                                      <li><a href="#">ACTIVIDAD 2</a></li>
                                      <li><a href="#">ACTIVIDAD 3</a></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>


                        </div>


                        <!-- Button -->
                        <div class="form-group">

                            <div class="col-md-2 col-md-offset-8">

                                <button id="singlebutton" name="singlebutton" class="btn btn-success">Terminar</button>

                            </div>
                        </div>


                    </fieldset>

                {!! Form::close() !!}

                </div>


@endsection
