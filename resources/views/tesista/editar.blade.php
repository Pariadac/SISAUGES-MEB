@extends('layouts.app')
@section('title','Editar Tesistas')
@section('content')


    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Tesista <small>pagina Editar</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Tesista/Editar</label>
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

    {!!Form::open(['url' => 'actualizarTesista/'.$tesista->id_tesista])!!}
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                {{Form::label('cedula','Cedula Tesista*')}}
                {{Form::text('cedula',$tesista->cedula,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('nombre','Nombre Tesista*')}}
                {{Form::text('nombre',$tesista->nombre,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('apellido','Apellido Tesista*')}}
                {{Form::text('apellido',$tesista->apellido,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('email','Correo Electronico Tesista*')}}
                {{Form::text('email',$tesista->email,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('telefono','Telefono Tesista*')}}
                {{Form::text('telefono',$tesista->telefono,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('carrera','Carrera Tesista*')}}
                {{Form::text('carrera',$tesista->carrera_tesista,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('semestre','Semestre/Año Tesista*')}}
                {{Form::text('semestre',$tesista->semestre_año_carrera,['class'=>'form-control camporequerido','type'=>'text'])}}
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