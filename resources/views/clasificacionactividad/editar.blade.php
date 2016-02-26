@extends('app')
<?php $title = "Editar Clasificación"?>
@section('content')

    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    {!!Form::open(['url' => 'actualizarClasificacionActividad/'.$clasificacionActividad->id_clasificacion_actividad])!!}

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                {{Form::label('descripcionClasificacion','Descripción de la Actividad')}}
                {{Form::text('descripcionClasificacion',$clasificacionActividad->descripcion_clasificacion,['class'=>'form-control','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('sectorActividad','Tipo de Actividad')}}
                {{Form::select('sectorActividad',$sectorActividad,$clasificacionActividad->id_sector_ac,['class'=>'form-control selectpicker','title'=>'Seleccione una opcion'])}}
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