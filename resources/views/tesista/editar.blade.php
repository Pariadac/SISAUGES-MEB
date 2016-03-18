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
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label><a href="{{url('/tesista')}}">Tesista</a>/Editar</label>
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
                {{Form::label('cedula','Cedula Tesista*',['id'=>"etiquetarequerida-1"])}}
                {{Form::text('cedula',$tesista->cedula,['class'=>'form-control camporequerido solo-numero solomaximo','type'=>'text', 'data-max'=>'8', 'data-etiqueta'=>'1'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('nombre','Nombre Tesista*',['id'=>"etiquetarequerida-2"])}}
                {{Form::text('nombre',$tesista->nombre,['class'=>'form-control camporequerido','type'=>'text', 'data-etiqueta'=>'2'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('apellido','Apellido Tesista*',['id'=>"etiquetarequerida-3"])}}
                {{Form::text('apellido',$tesista->apellido,['class'=>'form-control camporequerido','type'=>'text', 'data-etiqueta'=>'3'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('email','Correo Electronico Tesista*',['id'=>"etiquetarequerida-4"])}}
                {{Form::text('email',$tesista->email,['class'=>'form-control camporequerido solomails','type'=>'text', 'data-etiqueta'=>'4'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('telefono','Telefono Tesista*',['id'=>"etiquetarequerida-5"])}}
                {{Form::text('telefono',$tesista->telefono,['class'=>'form-control camporequerido solo-numero solomaximo','type'=>'text', 'data-max'=>'11' , 'data-etiqueta'=>'5'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('carrera','Carrera Tesista*',['id'=>"etiquetarequerida-6"])}}
                {{Form::text('carrera',$tesista->carrera_tesista,['class'=>'form-control camporequerido','type'=>'text', 'data-etiqueta'=>'6'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('semestre','Semestre/Año Tesista*',['id'=>"etiquetarequerida-7"])}}
                {{Form::text('semestre',$tesista->semestre_tesista,['class'=>'form-control camporequerido solomaximo','type'=>'text', 'data-max'=>'4', 'data-etiqueta'=>'7'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('actividad','Actividad relacionada*',['id'=>"etiquetarequerida-8"])}}
                {{Form::select('actividad',$actividad,$tesista->id_actividad,['class'=>'form-control selectpicker ','title'=>'Seleccione una opcion', 'data-etiqueta'=>'8'])}}
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