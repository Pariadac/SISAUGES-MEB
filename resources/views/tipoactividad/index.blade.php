@extends('app')
<?php $title = "Tipo Actividad" ?>
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    <table class="table table-responsive table-bordered">
        <tr>
            <th>N° Actividad</th>
            <th>Descripción Tipo Actividad</th>
            <th>Descripcion Clasificación Actividad</th>
            <th>Acción</th>
        </tr>
        @foreach($tipoActividad as $tA)
            <tr>
                <td>{{$tA->id_tipo_actividad}}</td>
                <td>{{$tA->descripcion_actividad}}</td>
                <td>{{$tA->descripcion_clasificacion}}</td>
                <td width="60" align="center">
                    {!! Html::link('tipoActividad/editar/'.$tA->id_tipo_actividad, 'Editar', ['class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs']) !!}
                </td>
                <td width="60" align="center">
                    {!! Form::open(['url' =>'tipoActividad/eliminar/'.$tA->id_tipo_actividad, 'method' => 'DELETE']) !!}
                    <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
@endsection