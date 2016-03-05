@extends('layouts.app')
@section('title','Indice del Sector')
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    <table class="table table-responsive table-bordered">
        <tr>
            <th>N° Actividad</th>
            <th>Descripción Sector Actividad</th>
            <th colspan="2">Acción</th>
        </tr>
        @foreach($sectorActividad as $sA)
            <tr>
                <td>{{$sA->id_sector_ac}}</td>
                <td>{{$sA->descripcion_sector}}</td>
                <td width="60" align="center">
                    {!! Html::link('sectorActividad/editar/'.$sA->id_sector_ac, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')) !!}
                </td>
                <td width="60" align="center">
                    {!! Form::open(array('url' =>'sectorActividad/eliminar/'.$sA->id_sector_ac, 'method' => 'DELETE')) !!}
                    <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
@endsection