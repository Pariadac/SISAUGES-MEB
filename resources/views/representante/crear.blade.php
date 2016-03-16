@extends('layouts.app')
@section('title','Agregar Representante')
@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Representante <small>pagina Agregar</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Institución/Agregar</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

<div class="validadorformularios">
    @if (Session::has('message'))

            <div class="contenedoralertas">
              <div id="alerta" style="display:none" class="" data-estado="{{ Session::get('message') }}" data-clase="0">
              
                <p><strong></strong>  <span></span></p>

              </div>
            </div>

    @else


        <div class="contenedoralertas">
          <div id="alerta" style="display:none" class="" data-estado="0" data-clase="0">
          
            <p><strong></strong>  <span></span></p>

          </div>
        </div>


    @endif
    {!!Form::open(['action' => 'RepresentanteController@store'])!!}
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                {{Form::label('cedula','Cedula Representante *')}}
                {{Form::text('cedula',null,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('nombre','Nombre Representante *')}}
                {{Form::text('nombre',null,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('apellido','Apellido Representante *')}}
                {{Form::text('apellido',null,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('email','Correo Electronico Representante *')}}
                {{Form::text('email',null,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('telefono','Telefono Representante *')}}
                {{Form::text('telefono',null,['class'=>'form-control camporequerido','type'=>'text'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('institucion','Institución *')}}
                {{Form::select('institucion[]',$institucion,'',['class'=>'form-control selectpicker','multiple','title'=>'Seleccione una opcion'])}}
            </div>
            <div class="col-md-6">
                {{Form::label('departamento','Departamento *')}}
                {{Form::select('departamento[]',$departamento,'',['class'=>'form-control selectpicker','multiple','title'=>'Seleccione una opcion'])}}
            </div>


            <div class="col-md-12 msnrequeridos">
                <p>Todos los campos con (*) son obligatorios</p>
            </div>

        </div>
    </div>


    <div class="col-md-offset-5">
        {{Form::submit('Enviar',['class'=>'btn btn-success', 'id'=>"singlebutton"])}}
    </div>

    {!! Form::close() !!}


</div>
@endsection

@push('scripts')
    <script src="{{asset ('bower_components/bootstrap-select/dist/js/bootstrap-select.js')}}"></script>
    <link href="{{asset('bower_components/bootstrap-select/dist/css/bootstrap-select.css')}}" rel="stylesheet" type="text/css">
@endpush