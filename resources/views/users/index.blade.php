@extends('layouts.app')
<?php $title='epa'; ?>

@section('content')

    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-hover">
        <tr>
            <th>Usuario N°</th>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        @foreach($usuario as $user)
            <tr>
                <td>{{$user->id_usuario}}</td>
                <td>{{$user->cedula}}</td>
                <td>{{$user->nombre}}</td>
                <td>{{$user->apellido}}</td>
                <td>{{$user->correo_electronico}}</td>
                <td>{{$user->nombre_usuario}}</td>
                <td width="60" align="center">
                    {!! Html::link('usuario/editar/'.$user->id_usuario, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')) !!}
                </td>
                <td width="60" align="center">
                    {!! Form::open(array('url' =>'usuario/eliminar/'.$user->id_usuario, 'method' => 'DELETE')) !!}
                    <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
@endsection