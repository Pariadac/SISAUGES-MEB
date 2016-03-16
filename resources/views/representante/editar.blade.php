@extends('layouts.app')
@section('title','Editar Representante')
@section('content')


    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Representante <small>pagina Editar</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Institución/Editar</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->


    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    {!!Form::open(['url' => 'actualizarRepresentante/'.$representante->id_representante])!!}
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                {{Form::label('cedula','Cedula Representante*')}}
                {{Form::text('cedula',$representante->cedula,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('nombre','Nombre Representante*')}}
                {{Form::text('nombre',$representante->nombre,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('apellido','Apellido Representante*')}}
                {{Form::text('apellido',$representante->apellido,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('email','Correo Electronico Representante*')}}
                {{Form::text('email',$representante->email,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('telefono','Telefono Representante*')}}
                {{Form::text('telefono',$representante->telefono,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('institucion','Institución *')}}
                {{Form::select('institucion[]',$institucion,'',['class'=>'form-control selectpicker','multiple','title'=>'Seleccione una opcion'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('departamento','Departamento *')}}
                {{Form::select('departamento[]',$departamento,'',['class'=>'form-control selectpicker','multiple','title'=>'Seleccione una opcion'])}}
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