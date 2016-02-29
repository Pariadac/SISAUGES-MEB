@extends('layouts.app')

@section('content')


				<?php $murl='muestras/guardar'; ?>


				<!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Muestras <small>pagina Detalles</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Muestras/Detalles</label>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->



                <div id="imgconttemp">
                    {!!Form::open(['url' => $murl, 'method' => 'POST','class'=>'form-horizontal muestraform imgcontenedortemporal', 'enctype'=> "multipart/form-data"])!!}


                        <?php

                                
                                echo '<input name="rutamuestra[]" type="hidden" value="'.url("/storage").'/'.$muestra->ruta_img_muestra.'">';


                        ?>


                    {!! Form::close() !!}
                </div>




                <div class="row" id="espacio">
                	<div class="col-md-4">

                		<div class="col-md-12 imgcargada" style="display:block!important;" >
                            <div class="alineador" style="margin-top:0px!important;">
                                <img src="<?php if ($muestra) {echo url('/storage').'/'.$muestra->ruta_img_muestra;} ?>" id="thumbnil">
                            </div>
                        </div>  


                	</div>
                	<div class="col-md-8" id="principal-suit">
                		<div class="col-md-6">
                			<label>Actividad</label>
                			<p>LOREM</p>
                		</div>
                		<div class="col-md-6">
                			<label>Codigo</label>
                			<p><?php echo $muestra->codigo_muestra; ?></p>
                		</div>
                		<div class="col-md-6">
                			<label>Fecha Recepción</label>
                			<p><?php echo $muestra->fecha_recepcion; ?></p>
                			
                		</div>

                		<div class="col-md-6">
                			<label>Fecha de Analisis</label>
                			<p><?php echo $muestra->fecha_analisis; ?></p>
                		</div>

                		<div class="col-md-12">
                			<label>Descripción</label>
                			<p><?php echo $muestra->descripcion_muestra; ?></p>
                		</div>

                	</div>
                </div>

                <div class="row">
                	<div class="col-md-10 col-md-offset-1 enfatizador">
                		<h3>Muestras Relacionadas por Actividad</h3>
                		<div id="seccion_relacionadas">
                			
                		</div>
                	</div>
                </div>

@endsection
