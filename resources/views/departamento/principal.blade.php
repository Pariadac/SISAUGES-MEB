@extends('layouts.app')
@section('title','Departamento')
@section('content')


    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Departamento <small>pagina Principal</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Departamento</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->




    <div >
        
        <table class="table table-responsive" style="margin-top:60px!important">
            <tbody>

                <tr>
                    <th class="alineadorr">Departamento</th>
                    <th class="tablaboton">Acción</th>
                </tr>

                <?php


                if ($mostrar) {
                    foreach ($mostrar as $key) {
                        echo '

                        <tr class="borrables">
                            <td class="alineadorr">'.$key->descripcion_departamento.'</td> 
                            <td>
                                <a href="/departamento/editar/'.$key->id_departamento.'" name="singlebutton" class="glyphicon glyphicon-pencil btn btn-warning btn-xs">Modificar</a>
                            </td>  
                        </tr>

                        ';
                    }
                }

                ?>


            </tbody>
        </table>

    </div>


@endsection
