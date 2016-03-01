@extends('layouts.app')
@section('title', 'Crear Actividad')
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
            </div>

            <div class="col-md-6">
                {{Form::label('sectorActividad','Sector Involucrado')}}
                {{Form::select('sectorActividad',$sectorActividad,'',['class'=>'form-control selectpicker','title'=>'Seleccione una opcion'])}}
            </div>

            <div class="col-md-6">
                {{Form::label('statusActividad','Status Actividad')}}
                {{Form::select('statusActividad',['No iniciado' => 'No Iniciado',
                                                  'Iniciado'    => 'Iniciado',
                                                  'En progreso' => 'En Progreso',
                                                  'Culminado'   => 'Culminado'],'',['class'=>'form-control selectpicker','title'=>'Seleccione una opcion'])}}
            </div>

            <div class="col-md-6">
                {{Form::label('permisoActividad','Permisologia')}}
                {{Form::select('permisoActividad',['Publico'    => 'Publico',
                                                   'Privado'    => 'Privado'],'',['class'=>'form-control selectpicker','title'=>'Seleccione una opcion'])}}
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