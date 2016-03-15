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


    <div class="col-md-12">
        <div class="contenedoralertas">
          <div id="alerta" style="display:none" class="" data-estado="0" data-clase="0">
          
            <p><strong></strong>  <span></span></p>

          </div>
        </div>
    </div>

    <div class="validadorformularios">

    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    {!!Form::open(['action'=>'UserController@store'])!!}
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-6">
                    {{Form::label('nivelUsuario','Nivel Usuario*')}}
                    {{Form::select('nivelUsuario[]',$nivel,'',['class'=>'form-control selectpicker','multiple', 'title'=>'Seleccione una opcion'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('cedula','Cedula*')}}
                    {{Form::text('cedula',null,['class'=>'form-control  camporequerido','type'=>'text'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('nombre','Nombre*')}}
                    {{Form::text('nombre',null,['class'=>'form-control  camporequerido','type'=>'text'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('apellido','Apellido*')}}
                    {{Form::text('apellido',null,['class'=>'form-control  camporequerido','type'=>'text'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('email','Correo Electronico*')}}
                    {{Form::text('email',null,['class'=>'form-control  camporequerido','type'=>'text'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('telefono','Telefono*')}}
                    {{Form::text('telefono',null,['class'=>'form-control  camporequerido','type'=>'text'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('nombreUsuario','Nombre Usuario*')}}
                    {{Form::text('nombreUsuario',null,['class'=>'form-control  camporequerido','type'=>'text'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('contraseña','Contraseña*')}}
                    {{Form::password('contraseña',['class'=>'form-control  camporequerido'])}}
                </div>

                <div class="col-md-12 msnrequeridos">
                    <p>Todos los campos con (*) son obligatorios</p>
                </div>

            </div>
        </div>


        <div class="col-md-offset-5">
            {{Form::submit('Enviar',['class'=>'btn btn-success', 'id'=>'singlebutton'])}}
        </div>

    {!! Form::close() !!}

    </div>



@endsection

@push('scripts')
<script src="{{asset ('bower_components/bootstrap-select/dist/js/bootstrap-select.js')}}"></script>
<link href="{{asset('bower_components/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css">
@endpush