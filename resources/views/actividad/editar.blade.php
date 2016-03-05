@extends('layouts.app')
@section('title', 'Editar Actividad')
@section('content')

    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    {!!Form::open(['url' => 'actualizarActividad/'.$actividad->id_actividad])!!}

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                {{Form::label('nombreActividad','Nombre de la Actividad')}}
                {{Form::text('nombreActividad',$actividad->nombre_actividad,['class'=>'form-control','type'=>'text'])}}
            </div>

            <div class="col-md-6">
                {{Form::label('sectorActividad','Sector Involucrado')}}
                {{Form::select('sectorActividad',$sectorActividad,$actividad->id_sector_ac,['class'=>'form-control selectpicker','title'=>'Seleccione una opcion'])}}
            </div>

            <div class="col-md-6">
                {{Form::label('statusActividad','Status Actividad')}}
                {{Form::select('statusActividad',['No iniciado' => 'No Iniciado',
                                                  'Iniciado'    => 'Iniciado',
                                                  'En progreso' => 'En Progreso',
                                                  'Culminado'   => 'Culminado'],$actividad->status_actividad,['class'=>'form-control selectpicker','title'=>'Seleccione una opcion'])}}
            </div>

            <div class="col-md-6">
                {{Form::label('permisoActividad','Permisologia')}}
                {{Form::select('permisoActividad',['Publico'    => 'Publico',
                                                   'Privado'    => 'Privado'],$actividad->permiso_actividad,['class'=>'form-control selectpicker','title'=>'Seleccione una opcion'])}}
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