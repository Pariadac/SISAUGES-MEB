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
                                <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Muestras/Lista</label>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->



                <table class="table">
                        <tbody>
                            <tr>
                                    <th>Imagen</th>
                                    <th>Actividad</th>
                                    <th>Tipo de Actividad</th>
                                    <th>Tecnica de estudio</th>
                                    <th>Fecha</th>
                                    <th class="tablaboton">Acción</th>
                            </tr>

                            <?php

                                foreach ($datos as $key=> $value) {


                                    if ($key % 2!= 0) {
                                        $col="info";
                                    }else{
                                        $col="";
                                    }

                                    echo '


                                        <tr class="'.$col.'">
                                            <td >
                                                <div class="contenedor-imagen">
                                                    <img src="'.url("/storage").'/'.$value->ruta_img_muestra.'">
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                '.$value->fecha_analisis.'
                                            </td>
                                            <td >
                                                <a href="'.url("/muestras/storage").'" id="singlebutton" name="singlebutton" class="glyphicon glyphicon-list btn btn-primary btn-xs">Detalles</a>

                                                <a href="'.url("/muestras/editar")."/".$value->id_muestra.'" id="singlebutton" name="singlebutton" class="glyphicon glyphicon-pencil btn btn-warning btn-xs">Modificar</a>

                                                <a href="'.url("/muestras/eliminar")."/".$value->id_muestra.'" id="singlebutton" name="singlebutton" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</a>
                                            </td>
                                        </tr>    


                                    ';
                                }

                            ?>


                    </table>



@endsection
