@extends('layouts.app')
@section('title', 'Agregar Usuarios')
@section('content')


    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Usuarios <small>pagina Agregar</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label><a href="{{url('/usuario')}}">Usuarios</a>/Agregar</label>
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

    {!!Form::open(['action'=>'UserController@store'])!!}
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-6">
                    {{Form::label('nivelUsuario','Nivel Usuario*',['id'=>"etiquetarequerida-1"])}}
                    {{Form::select('nivelUsuario[]',$nivel,'',['class'=>'form-control selectpicker','multiple', 'title'=>'Seleccione una opcion', 'data-etiqueta'=>'1'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('cedula','Cedula*',['id'=>"etiquetarequerida-2"])}}
                    {{Form::text('cedula',null,['class'=>'form-control  camporequerido solo-numero solomaximo','type'=>'text', 'data-max'=>'8', 'data-etiqueta'=>'2'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('nombre','Nombre*',['id'=>"etiquetarequerida-3"])}}
                    {{Form::text('nombre',null,['class'=>'form-control  camporequerido','type'=>'text', 'data-etiqueta'=>'3'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('apellido','Apellido*',['id'=>"etiquetarequerida-4"])}}
                    {{Form::text('apellido',null,['class'=>'form-control  camporequerido','type'=>'text', 'data-etiqueta'=>'4'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('email','Correo Electronico*',['id'=>"etiquetarequerida-5"])}}
                    {{Form::text('email',null,['class'=>'form-control  camporequerido solomails','type'=>'text', 'data-etiqueta'=>'5'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('telefono','Telefono*',['id'=>"etiquetarequerida-6"])}}
                    {{Form::text('telefono',null,['class'=>'form-control  camporequerido solo-numero solomaximo','type'=>'text', 'data-max'=>'11', 'data-etiqueta'=>'6'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('nombreUsuario','Nombre Usuario*',['id'=>"etiquetarequerida-7"])}}
                    {{Form::text('nombreUsuario',null,['class'=>'form-control  camporequerido','type'=>'text', 'data-etiqueta'=>'7'])}}
                </div>
                <div class="col-md-6">
                    {{Form::label('contraseña','Contraseña*',['id'=>"etiquetarequerida-8"])}}
                    {{Form::password('contraseña',['class'=>'form-control  camporequerido', 'data-etiqueta'=>'8'])}}
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