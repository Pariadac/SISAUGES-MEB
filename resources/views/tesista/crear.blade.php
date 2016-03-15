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
    {!!Form::open(['action' => 'TesistaController@store'])!!}
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                {{Form::label('cedula','Cedula Tesista*')}}
                {{Form::text('cedula',null,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('nombre','Nombre Tesista*')}}
                {{Form::text('nombre',null,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('apellido','Apellido Tesista*')}}
                {{Form::text('apellido',null,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('email','Correo Electronico Tesista*')}}
                {{Form::text('email',null,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('telefono','Telefono Tesista*')}}
                {{Form::text('telefono',null,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('carrera','Carrera Tesista*')}}
                {{Form::text('carrera',null,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('semestre','Semestre/Año Tesista*')}}
                {{Form::text('semestre',null,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('actividad','Actividad relacionada*')}}
                {{Form::select('actividad',$actividad,null,['class'=>'form-control selectpicker','title'=>'Seleccione una opcion'])}}
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