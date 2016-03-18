@extends('layouts.app')
@section('title', 'Editar Usuario')
@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Usuarios <small>pagina Editar</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label><a href="{{url('/usuario')}}">Usuarios</a>/Editar</label>
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

    {!!Form::open(['url' => 'actualizarUsuario/'.$usuario->id_usuario])!!}
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                {{Form::label('nivelUsuario','Nivel Usuario*',['id'=>"etiquetarequerida-1"])}}
                {{Form::select('nivelUsuario[]',$nivel,$usuarioSeleccionado,['class'=>'form-control selectpicker','multiple','title'=>'Seleccione una opcion', 'data-etiqueta'=>'1'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('cedula','Cedula Usuario*',['id'=>"etiquetarequerida-2"])}}
                {{Form::text('cedula',\Crypt::decrypt($usuario->cedula),['class'=>'form-control camporequerido solo-numero solomaximo','type'=>'text', 'data-max'=>'8', 'data-etiqueta'=>'2'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('nombre','Nombre*',['id'=>"etiquetarequerida-3"])}}
                {{Form::text('nombre',$usuario->nombre,['class'=>'form-control camporequerido','type'=>'text', 'data-etiqueta'=>'3'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('apellido','Apellido*',['id'=>"etiquetarequerida-4"])}}
                {{Form::text('apellido',$usuario->apellido,['class'=>'form-control camporequerido','type'=>'text', 'data-etiqueta'=>'4'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('email','Correo Electronico*',['id'=>"etiquetarequerida-5"])}}
                {{Form::text('email',$usuario->email,['class'=>'form-control camporequerido','type'=>'text', 'data-etiqueta'=>'5'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('telefono','Telefono*',['id'=>"etiquetarequerida-6"])}}
                {{Form::text('telefono',$usuario->telefono,['class'=>'form-control camporequerido solo-numero solomaximo','type'=>'text', 'data-max'=>'11', 'data-etiqueta'=>'6'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('nombreUsuario','Nombre de Acceso*',['id'=>"etiquetarequerida-7"])}}
                {{Form::text('nombreUsuario',$usuario->username,['class'=>'form-control camporequerido','type'=>'text', 'data-etiqueta'=>'7'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('password','Contraseña*',['id'=>"etiquetarequerida-8"])}}
                {{Form::password('password',['class'=>'form-control camporequerido',
                                            'placeholder'=> 'Introduzca nueva contraseña', 'data-etiqueta'=>'8'])}}
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