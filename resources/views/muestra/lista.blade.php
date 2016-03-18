@extends('layouts.app')

@section('content')

                <?php $murl='muestras/guardar'; 


                ?>

                <div id="mimoneda">
                    {!! Form::token() !!}
                </div>

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Muestras <small>pagina Listar</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Muestras</label>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <div > 
                {!!Form::open(['url' => 'muestras/buscarfiltro', 'method' => 'POST','class'=>'form-horizontal busquedas', 'enctype'=> "multipart/form-data"])!!}


                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Actividad</label>

                                <select class="my_select_box chosen-select" name="actividades_mues_bus">
                                    <option value="">Seleccione...</option>
                                    <?php                                     


                                       foreach ($actividad as $key) {
                                          
                                            echo '<option value="'.$key->id_actividad.'">'.$key->nombre_actividad.'</option>';
                                          
                                        }

                                    ?>

                                </select>


                                <!--<input autocomplete="off" type="text" id="lock1" name="actividades_mues_bus_f" class="form-control mi-chosen" data-location="1" placeholder="Actividad">

                                <input type="hidden" name="actividades_mues_bus" id="t_lock1" value="">

                                <ul class="oculto1" id="location1">
                                    
                                </ul>-->

                            </div>
                            
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Institucion</label>

                                <select class="my_select_box chosen-select" name="institucion_mues_bus">
                                    <option value="">Seleccione...</option>
                                    <?php                                     


                                       foreach ($institucion as $key) {
                                          
                                            echo '<option value="'.$key->id_actividad.'">'.$key->nombre_institucion.'</option>';
                                          
                                        }

                                    ?>

                                </select>

                                <!--<input autocomplete="off" type="text" id="lock3" name="institucion_mues_bus_f" class="form-control mi-chosen" data-location="3" placeholder="Institución">
                                <input type="hidden" name="institucion_mues_bus" id="t_lock3" value="">

                                <ul class="oculto1" id="location3">
                                    
                                </ul>-->

                            </div>
                        </div>
                        <div class="col-md-2">

                             <div class="form-group">
                                <label>Tecnica de Estudio</label>

                                <select id="tipo_muestra" name="tecnica_mues_bus" class="my_select_box chosen-select">
                                  <option value="">Seleccione...</option>
                                  <?php


                                    foreach ($tecnica as $key) {

                                        echo '<option value="'.$key->id_tecnica_estudio.'">'.$key->descripcion_tecnica_estudio.'</option>';

                                    }


                                  ?>
                                </select>


                            </div>

                        </div>
                        <div class="col-md-4">

                            <div class="col-md-12">
                                <label>Fecha de Estudio</label>
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="text" name="inicio_mues_bus" id="inicio_mues_bus" class="form-control" placeholder="Desde">
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="text" name="fin_mues_bus" id="fin_mues_bus" class="form-control" placeholder="Hasta">
                            </div>
                        </div>

                        

                        <div class=" col-md-1 col-md-offset-1">
                                <label> </label>
                            <button type="button" class="btn btn-primary buscador-muest">Buscar</button>
                        </div> 



                {!! Form::close() !!}

                </div>

                <div id="imgconttemp">
                    {!!Form::open(['url' => $murl, 'method' => 'POST','class'=>'form-horizontal muestraform imgcontenedortemporal', 'enctype'=> "multipart/form-data"])!!}


                        <?php

                            foreach ($itemsForCurrentPage as $keys) {
                                
                                echo '<input name="rutamuestra[]" type="hidden" value="'.url("/storage").'/'.$keys['muestra-d']->ruta_img_muestra.'">';

                            }

                        ?>


                    {!! Form::close() !!}
                </div>



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

                                foreach ($itemsForCurrentPage as $key=> $value) {


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

                    <div class="estilospaginador">
                        
                        {!! $paginador->render(); !!}

                    </div>

@endsection

