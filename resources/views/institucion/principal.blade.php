@extends('layouts.app')
@section('title','Institucion')
@section('content')


    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Institución <small>pagina Principal</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Institución</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->


    <?php

        if ($mensaje) {
            echo $mensaje;
        }

    ?>


    <div class="col-md-12 formulariosajax">
        {!!Form::open(['url' => '/institucion/buscar', 'class' => 'busqueda-inst'])!!}

            <div class="col-md-4">
                <input class="form-control" type="text" name="busqueda" placeholder="BUSCAR">
            </div>

            <button type="button" id="boton-inst" class="btn btn-primary">Buscar</button>


        {!! Form::close() !!}
    </div>


    <table class="table table-responsive" style="margin-top:60px!important">
        <tbody>

            <tr>
                <th>Nombre Institucion</th>
                <th>Direccion institucion</th>
                <th>Correo istitucion</th>
                <th>Telefono Institucion</th>
                <th class="tablaboton">Acción</th>
            </tr>
            @foreach($mostrar as $m)
                <tr class="borrables">
                    <td>{{$m->nombre_institucion}}</td>
                    <td>{{$m->direccion_institucion}}</td>
                    <td>{{$m->correo_institucional}}</td>
                    <td>{{$m->telefono_institucion}}</td>
                    <td>
                        {!! Html::link('institucion/editar/'.$m->id_institucion,'Modificar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')) !!}

                    </td>
                </tr>
            @endforeach
        </tbody>




    </table>


@endsection
