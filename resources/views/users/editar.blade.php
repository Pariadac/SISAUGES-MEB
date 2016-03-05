@extends('layouts.app')
<?php $title = "Editar Usuario"?>
@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Usuarios <small>pagina Editar</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Usuarios/Editar</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->


    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    {!!Form::open(['url' => 'actualizarUsuario/'.$usuario->id_usuario])!!}
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                {{Form::label('nivel_usuario','Nivel Usuario')}}
                {{Form::select('nivel_usuario[]',$nivel,$usuario->NivelUsuario->id_nivel_de_usuario,['class'=>'form-control selectpicker','multiple'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('cedula','Cedula Usuario')}}
                {{Form::text('cedula',\Crypt::decrypt($usuario->cedula),['class'=>'form-control','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('nombre','Nombre')}}
                {{Form::text('nombre',$usuario->nombre,['class'=>'form-control','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('apellido','Apellido')}}
                {{Form::text('apellido',$usuario->apellido,['class'=>'form-control','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('email','Correo Electronico')}}
                {{Form::text('email',$usuario->email,['class'=>'form-control','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('telefono','Telefono')}}
                {{Form::text('telefono',$usuario->telefono,['class'=>'form-control','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('nombreUsuario','Nombre de Acceso')}}
                {{Form::text('nombreUsuario',$usuario->username,['class'=>'form-control','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('password','Contraseña')}}
                {{Form::password('password',['class'=>'form-control',
                                            'placeholder'=> 'Introduzca nueva contraseña'])}}
            </div>
        </div>
    </div>


    <div class="col-md-offset-5">
        {{Form::submit('Enviar',['class'=>'btn btn-primary'])}}
    </div>

    {!! Form::close() !!}


@endsection

@push('scripts')
<script src="{{asset ('bower_components/bootstrap-select/dist/js/bootstrap-select.js')}}"></script>
<link href="{{asset('bower_components/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css">
@endpush