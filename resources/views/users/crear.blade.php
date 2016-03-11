@extends('layouts.app')
@section('title', 'Agregar Usuarios')
@section('content')


    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Usuarios <small>pagina Agregar</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Usuarios/Agregar</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    {!!Form::open(['action'=>'UserController@store'])!!}
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-6">
                    {{Form::label('nivelUsuario','Nivel Usuario')}}
                    {{Form::select('nivelUsuario[]',$nivel,'',['class'=>'form-control selectpicker','multiple'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('cedula','Cedula')}}
                    {{Form::text('cedula',null,['class'=>'form-control','type'=>'text'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('nombre','Nombre')}}
                    {{Form::text('nombre',null,['class'=>'form-control','type'=>'text'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('apellido','Apellido')}}
                    {{Form::text('apellido',null,['class'=>'form-control','type'=>'text'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('email','Correo Electronico')}}
                    {{Form::text('email',null,['class'=>'form-control','type'=>'text'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('telefono','Telefono')}}
                    {{Form::text('telefono',null,['class'=>'form-control','type'=>'text'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('nombreUsuario','Nombre Usuario')}}
                    {{Form::text('nombreUsuario',null,['class'=>'form-control','type'=>'text'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('contraseña','Contraseña')}}
                    {{Form::password('contraseña',['class'=>'form-control'])}}
                </div>
            </div>
        </div>


        <div class="col-md-offset-5">
            {{Form::submit('Enviar',['class'=>'btn btn-primary'])}}
        </div>
    {!!Form::close()!!}
@endsection

@push('scripts')
<script src="{{asset ('bower_components/bootstrap-select/dist/js/bootstrap-select.js')}}"></script>
<link href="{{asset('bower_components/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css">
@endpush