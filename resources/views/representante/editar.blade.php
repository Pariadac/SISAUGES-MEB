@extends('app')
<?php $title =" Editar Representante" ?>
@section('content')

    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    {!!Form::open(['url' => 'actualizarRepresentante/'.$representante->id_representante])!!}
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                {{Form::label('cedula','Cedula Representante')}}
                {{Form::text('cedula',$representante->cedula,['class'=>'form-control','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('nombre','Nombre Representante')}}
                {{Form::text('nombre',$representante->nombre,['class'=>'form-control','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('apellido','Apellido Representante')}}
                {{Form::text('apellido',$representante->apellido,['class'=>'form-control','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('email','Correo Electronico Representante')}}
                {{Form::text('email',$representante->email,['class'=>'form-control','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('telefono','Telefono Representante')}}
                {{Form::text('telefono',$representante->telefono,['class'=>'form-control','type'=>'text'])}}
            </div>
        </div>
    </div>


    <div class="col-md-offset-5">
        {{Form::submit('Enviar',['class'=>'btn btn-primary'])}}
    </div>

    {!! Form::close() !!}


@endsection