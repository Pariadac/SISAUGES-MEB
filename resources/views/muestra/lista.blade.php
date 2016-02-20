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
                            </tr>

                            <?php

                                foreach ($datos as $key) {
                                    echo '


                                        <tr>
                                            <td class="contenedor-imagen">
                                                <img src="'.url("/storage").'/'.$key->ruta_img_muestra.'"
                                            </td>
                                            <td>
                                                '.$key->codigo_muestra.'
                                            </td>
                                            <td>
                                                '.$key->fecha_analisis.'
                                            </td>
                                            <td>
                                                <a href="'.url("/storage").'" id="singlebutton" name="singlebutton" class="btn btn-primary">Detalles</a>
                                            </td>
                                            <td>
                                                <a href="vistaformulario_siguiente.php" id="singlebutton" name="singlebutton" class="btn btn-primary">Modificar</a>
                                            </td>
                                            <td>
                                                <a href="vistaformulario_siguiente.php" id="singlebutton" name="singlebutton" class="btn btn-primary">Eliminar</a>
                                            </td>
                                        </tr>    


                                    ';
                                }

                            ?>


                    </table>



@endsection
