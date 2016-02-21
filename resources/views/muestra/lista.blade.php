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
                                    <th>Codigo</th>
                                    <th>Fecha</th>
                                    <th>Acción</th>
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
                                            <td class="contenedor-imagen">
                                                <img src="'.url("/storage").'/'.$value->ruta_img_muestra.'"
                                            </td>
                                            <td>
                                                '.$value->codigo_muestra.'
                                            </td>
                                            <td>
                                                '.$value->fecha_analisis.'
                                            </td>
                                            <td >
                                                <a href="'.url("/storage").'" id="singlebutton" name="singlebutton" class="btn btn-primary">Detalles</a>

                                                <a href="vistaformulario_siguiente.php" id="singlebutton" name="singlebutton" class="btn btn-primary">Modificar</a>

                                                <a href="vistaformulario_siguiente.php" id="singlebutton" name="singlebutton" class="btn btn-primary">Eliminar</a>
                                            </td>
                                        </tr>    


                                    ';
                                }

                            ?>


                    </table>



@endsection
