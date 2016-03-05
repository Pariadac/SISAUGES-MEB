@extends('layouts.app')
@section('title','Crear Tesista')
@section('content')


    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Tesista <small>pagina Agregar</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Tesista/Agregar</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->


    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    {!!Form::open(['action' => 'TesistaController@store'])!!}
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                {{Form::label('cedula','Cedula Tesista')}}
                {{Form::text('cedula',null,['class'=>'form-control','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('nombre','Nombre Tesista')}}
                {{Form::text('nombre',null,['class'=>'form-control','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('apellido','Apellido Tesista')}}
                {{Form::text('apellido',null,['class'=>'form-control','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('email','Correo Electronico Tesista')}}
                {{Form::text('email',null,['class'=>'form-control','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('telefono','Telefono Tesista')}}
                {{Form::text('telefono',null,['class'=>'form-control','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('carrera','Carrera Tesista')}}
                {{Form::text('carrera',null,['class'=>'form-control','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('semestre','Semestre/Año Tesista')}}
                {{Form::text('semestre',null,['class'=>'form-control','type'=>'text'])}}
            </div>
        </div>
    </div>


    <div class="col-md-offset-5">
        {{Form::submit('Enviar',['class'=>'btn btn-primary'])}}
    </div>

    {!! Form::close() !!}

@endsection