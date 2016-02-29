@extends('layouts.app')
<?php $title = "Editar Tipo Actividad"?>
@section('content')

    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    {!!Form::open(['url' => 'actualizarTipoActividad/'.$tipoActividad->id_tipo_actividad])!!}
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                {{Form::label('descripcion','Descripcion Actividad')}}
                {{Form::text('descripcion',$tipoActividad->descripcion_actividad,['class'=>'form-control','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('clasificacionActividad','Clasificacion de la Actividad')}}
                {{Form::select('clasificacionActividad',$clasificacionActividad,$tipoActividad->id_clasificacion_actividad,['class'=>'form-control selectpicker','title'=>'Seleccione una opcion'])}}
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