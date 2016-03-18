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
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label><a href="{{url('/representante')}}">Representante</a>/Editar</label>
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
                {{Form::label('cedula','Cedula Representante*',['id'=>"etiquetarequerida-1"])}}
                {{Form::text('cedula',$representante->cedula,['class'=>'form-control camporequeridosolo-numero solomaximo','type'=>'text', 'data-max'=>'8', 'data-etiqueta'=>'1'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('nombre','Nombre Representante*',['id'=>"etiquetarequerida-2"])}}
                {{Form::text('nombre',$representante->nombre,['class'=>'form-control camporequerido','type'=>'text', 'data-etiqueta'=>'2'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('apellido','Apellido Representante*',['id'=>"etiquetarequerida-3"])}}
                {{Form::text('apellido',$representante->apellido,['class'=>'form-control camporequerido','type'=>'text', 'data-etiqueta'=>'3'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('email','Correo Electronico Representante*',['id'=>"etiquetarequerida-4"])}}
                {{Form::text('email',$representante->email,['class'=>'form-control camporequerido solomails','type'=>'text', 'data-etiqueta'=>'4'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('telefono','Telefono Representante*',['id'=>"etiquetarequerida-5"])}}
                {{Form::text('telefono',$representante->telefono,['class'=>'form-control camporequerido solo-numero solomaximo','type'=>'text', 'data-max'=>'11' , 'data-etiqueta'=>'5'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('institucion','Institución *',['id'=>"etiquetarequerida-6"])}}
                {{Form::select('institucion[]',$institucion,$representanteInstitucion,['class'=>'form-control selectpicker','multiple','title'=>'Seleccione una opcion', 'data-etiqueta'=>'6'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('departamento','Departamento *',['id'=>"etiquetarequerida-7"])}}
                {{Form::select('departamento[]',$departamento,$representanteDepartamento,['class'=>'form-control selectpicker','multiple','title'=>'Seleccione una opcion', 'data-etiqueta'=>'7'])}}
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