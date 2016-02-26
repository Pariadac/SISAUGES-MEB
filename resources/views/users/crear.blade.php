@extends('app')
<?php $title='crear';?>
@section('content')

    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    {!!Form::open(['action'=>'UserController@store'])!!}
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-6">
                    {{Form::label('cedula','Cedula Usuario')}}
                    {{Form::text('cedula',null,['class'=>'form-control','type'=>'text'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('nombre','Nombre Usuario')}}
                    {{Form::text('nombre',null,['class'=>'form-control','type'=>'text'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('apellido','Apellido Usuario')}}
                    {{Form::text('apellido',null,['class'=>'form-control','type'=>'text'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('email','Correo Electronico Usuario')}}
                    {{Form::text('email',null,['class'=>'form-control','type'=>'text'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('telefono','Telefono Usuario')}}
                    {{Form::text('telefono',null,['class'=>'form-control','type'=>'text'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('nombreUsuario','Nombre Usuario')}}
                    {{Form::text('nombreUsuario',null,['class'=>'form-control','type'=>'text'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('contraseña','Contraseña')}}
                    {{Form::text('contraseña',null,['class'=>'form-control','type'=>'password'])}}
                </div>
            </div>
        </div>


        <div class="col-md-offset-5">
            {{Form::submit('Enviar',['class'=>'btn btn-primary'])}}
        </div>
    {!!Form::close()!!}
@endsection