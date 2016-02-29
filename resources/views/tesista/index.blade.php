@extends('layouts.app')
<?php $title='epa'; ?>
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    <table class="table table-hover">
        <tr>
            <th>Tesista N°</th>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
        @foreach($tesista as $tes)
            <tr>
                <td>{{$tes->id_tesista}}</td>
                <td>{{$tes->cedula}}</td>
                <td>{{$tes->nombre}}</td>
                <td>{{$tes->apellido}}</td>
                <td>{{$tes->correo_electronico}}</td>
                <td width="60" align="center">
                    {!! Html::link('tesista/editar/'.$tes->id_tesista, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')) !!}
                </td>
                <td width="60" align="center">
                    {!! Form::open(array('url' =>'tesista/eliminar/'.$tes->id_tesista, 'method' => 'DELETE')) !!}
                    <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
@endsection