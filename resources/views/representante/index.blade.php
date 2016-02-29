@extends('layouts.app')
<? $title = "Indice de representantes"?>
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
        @foreach($representante as $rep)
            <tr>
                <td>{{$rep->id_representante}}</td>
                <td>{{$rep->cedula}}</td>
                <td>{{$rep->nombre}}</td>
                <td>{{$rep->apellido}}</td>
                <td>{{$rep->email}}</td>
                <td width="60" align="center">
                    {!! Html::link('representante/editar/'.$rep->id_representante, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')) !!}
                </td>
                <td width="60" align="center">
                    {!! Form::open(array('url' =>'representante/eliminar/'.$rep->id_representante, 'method' => 'DELETE')) !!}
                    <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
@endsection