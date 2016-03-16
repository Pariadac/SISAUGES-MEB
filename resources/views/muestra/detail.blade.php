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
                                <i class="fa fa-dashboard"></i> Ubicacion:/ <label><a href="/muestras/lista">Muestras</a>/Detalles</label>
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
                		<h3>Muestras Relacionadas</h3>
                		<div id="seccion_relacionadas">
                			<div class="col-md-12">
                                <table class="table table-responsive">
                                    <tbody>
                                        <tr>
                                                <th>Imagen</th>
                                                <th>Actividad</th>
                                                <th>Institucion</th>
                                                <th>Tecnica de estudio</th>
                                                <th>Fecha</th>
                                                <th class="tablaboton">Acción</th>
                                        </tr>

                                        <?php

                                            foreach ($releated as $key=> $value) {


                                                if ($key % 2!= 0) {
                                                    $col="info";
                                                }else{
                                                    $col="";
                                                }

                                                echo '


                                                    <tr class="'.$col.'">
                                                        <td >
                                                            <div class="contenedor-imagen">
                                                                <img src="'.url("/storage").'/'.$value['muestra-d']->ruta_img_muestra.'">
                                                            </div>
                                                        </td>
                                                        <td>'.$value['actividad-d'][0]->nombre_actividad.'</td>
                                                        <td>'.$value['institucion-d'][0]->nombre_institucion.'</td>
                                                        <td>'.$value['tecnica-d'][0]->descripcion_tecnica_estudio.'</td>
                                                        <td>
                                                            '.$value['muestra-d']->fecha_analisis.'
                                                        </td>
                                                        <td >
                                                            <a href="'.url("/muestras/detalles")."/".$value['muestra-d']->id_muestra.'" name="singlebutton" class="glyphicon glyphicon-list btn btn-primary btn-xs">Detalles</a>

                                                            <a href="'.url("/muestras/editar")."/".$value['muestra-d']->id_muestra.'" name="singlebutton" class="glyphicon glyphicon-pencil btn btn-warning btn-xs">Modificar</a>

                                                            
                                                        </td>
                                                    </tr>    


                                                ';
                                            }

                                            /*<a href="'.url("/muestras/eliminar")."/".$value->id_muestra.'" id="singlebutton" name="singlebutton" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</a>*/

                                        ?>


                                </table>
                            </div>
                		</div>
                	</div>
                </div>

@endsection
