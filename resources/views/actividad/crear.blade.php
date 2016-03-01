@extends('layouts.app')
<?php $title = "Crear Actividad" ?>
@section('content')

    
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Actividad <small>pagina Agregar</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Actividad/Agregar</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->



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