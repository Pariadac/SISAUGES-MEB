@extends('app')
<?php $title="index";?>
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    <table class="table table-hover">
        <tr>
            <th>Representante N°</th>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        @foreach($actividad as $act)
            <tr>
                <td>{{$act->id_actividad}}</td>
                <td>{{$act->nombre_actividad}}</td>
                <td>{{$act->status_actividad}}</td>
                <td>{{$act->permisos_actividad}}</td>
                <td width="60" align="center">
                    {!! Html::link('actividad/editar/'.$act->id_actividad, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')) !!}
                </td>
                <td width="60" align="center">
                    {!! Form::open(array('url' =>'actividad/eliminar/'.$act->id_actividad, 'method' => 'DELETE')) !!}
                    <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
@endsection