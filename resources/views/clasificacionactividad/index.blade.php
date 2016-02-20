@extends('app')
<?php $title="crear";?>
@section('content')
    @if (Session::has('status'))
        <div class="alert alert-success">{!! Session::get('status') !!}</div>
    @endif
    <table class="table table-responsive table-bordered">
        <tr>
            <th>N° Actividad</th>
            <th>Clasificación Actividad</th>
            <th>Sector Relacionado</th>
        </tr>
        @foreach($clasificacionActividad as $cA)
            <tr>
                <td>{{$cA->id_clasificacion_actividad}}</td>
                <td>{{$cA->descripcion_clasificacion}}</td>
                <td>{{$cA->descripcion_sector}}</td>

                <td width="60" align="center">
                    {!! Html::link('clasificacionActividad/editar/'.$cA->id_clasificacion_actividad, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')) !!}
                </td>
                <td width="60" align="center">
                    {!! Form::open(array('url' =>'clasificacionActividad/eliminar/'.$cA->id_clasificacion_actividad, 'method' => 'DELETE')) !!}
                    <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
@endsection