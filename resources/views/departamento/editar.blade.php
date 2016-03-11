@extends('layouts.app')

@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Departamento  <small>pagina Crear</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Departamento /Editar</label>
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
    {!!Form::open(['url' => 'departamento/edita/'.$institucion->id_institucion])!!}


        <div class="panel panel-default">
            <div class="panel-body">
                
                 <div class="col-md-6">
                    {{Form::label('Departamento*')}}
                    {{Form::text('nomb',$departamento->descripcion_departamento,['class'=>'form-control camporequerido','type'=>'text'])}}
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