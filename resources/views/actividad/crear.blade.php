@extends('app')
<?php $title = "Crear Actividad" ?>
@section('content')


    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    {!!Form::open(['action' => 'ActividadController@store'])!!}
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                {{Form::label('nombreActividad','Nombre de la Actividad')}}
                {{Form::text('nombreActividad',null,['class'=>'form-control','type'=>'text'])}}
                {{Form::select}}
            </div>
        </div>
    </div>


    <div class="col-md-offset-5">
        {{Form::submit('Enviar',['class'=>'btn btn-primary'])}}
    </div>

    {!! Form::close() !!}

@endsection