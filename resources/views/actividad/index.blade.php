@extends('layouts.app')
@section('title', 'Agregar Actividad')
@section('content')

    
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Actividad <small>pagina Principal</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Actividad</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->



    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    <table class="table table-responsive">
        <tr>
            <th>Actividad N°</th>
            <th>Nombre Actividad</th>
            <th>Status Actividad</th>
            <th>Permisos</th>
            <th>Involucrados</th>
            <th class="tablaboton">Accion</th>
        </tr>
        @foreach($actividad as $act)
            <tr>
                <td>{{$act->id_actividad}}</td>
                <td>{{$act->nombre_actividad}}</td>
                <td>{{$act->status_actividad}}</td>
                <td>{{$act->permiso_actividad}}</td>
                <td>{{$act->sector->descripcion_sector}}</td>

                <td width="120" align="center">

                    {!! Html::link('actividad/editar/'.$act->id_actividad, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')) !!}

                    {!! Form::open(array('url' =>'actividad/eliminar/'.$act->id_actividad, 'method' => 'DELETE')) !!}
                        <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>

    <div class="estilospaginador">
        {!! $actividad->render() !!}
    </div>
@endsection