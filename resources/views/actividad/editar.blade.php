@extends('layouts.app')
@section('title', 'Editar Actividad')
@section('content')


    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Actividad <small>pagina Editar</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Actividad/Editar</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

<div class="validadorformularios">

    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    {!!Form::open(['url' => 'actualizarActividad/'.$actividad->id_actividad])!!}

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                {{Form::label('nombreActividad','Nombre de la Actividad*',['id'=>"etiquetarequerida-1"])}}
                {{Form::text('nombreActividad',$actividad->nombre_actividad,['class'=>'form-control camporequerido','type'=>'text', 'data-etiqueta'=>'1'])}}
            </div>

            <div class="col-md-6">
                {{Form::label('sectorActividad','Sector Involucrado*',['id'=>"etiquetarequerida-2"])}}
                {{Form::select('sectorActividad',$sectorActividad,$actividad->id_sector_ac,['class'=>'form-control selectpicker','title'=>'Seleccione una opcion', 'data-etiqueta'=>'2'])}}
            </div>

            <div class="col-md-6">
                {{Form::label('statusActividad','Status Actividad*',['id'=>"etiquetarequerida-3"])}}
                {{Form::select('statusActividad',['No iniciado' => 'No Iniciado',
                                                  'Iniciado'    => 'Iniciado',
                                                  'En progreso' => 'En Progreso',
                                                  'Culminado'   => 'Culminado'],$actividad->status_actividad,['class'=>'form-control selectpicker','title'=>'Seleccione una opcion', 'data-etiqueta'=>'3'])}}
            </div>

            <div class="col-md-6">
                {{Form::label('permisoActividad','Permisologia*',['id'=>"etiquetarequerida-4"])}}
                {{Form::select('permisoActividad',['Publico'    => 'Publico',
                                                   'Privado'    => 'Privado'],$actividad->permiso_actividad,['class'=>'form-control selectpicker','title'=>'Seleccione una opcion', 'data-etiqueta'=>'4'])}}
            </div>

            <div class="col-md-6">
                {{Form::label('representante','Representante Actividad*',['id'=>"etiquetarequerida-5"])}}
                {{Form::select('representante[]',$representante,$representanteSeleccionado,['class'=>'form-control selectpicker camporequerido','multiple','title'=>'Seleccione una opcion', 'data-etiqueta'=>'5'])}}
            </div>

            <div class="col-md-12 msnrequeridos">
                <p>Todos los campos con (*) son obligatorios</p>
            </div>
        </div>
    </div>


    <div class="col-md-offset-5">
        {{Form::submit('Enviar',['class'=>'btn btn-primary'])}}
    </div>

    {!! Form::close() !!}

</div>

@endsection
@push('scripts')
    <script src="{{asset ('bower_components/bootstrap-select/dist/js/bootstrap-select.js')}}"></script>
    <link href="{{asset('bower_components/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css">
@endpush