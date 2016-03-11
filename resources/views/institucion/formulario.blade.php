@extends('layouts.app')

@section('content')


    <?php

        if (isset($retorno)) {
          $alerta=1;
          $clase=$retorno;
        }else{
          $alerta=0;
          $clase=0;
        }

    ?>
    
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Institución <small>pagina Agregar</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Institución/Agregar</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

    <div class="col-md-12">
        <div class="contenedoralertas">
          <div id="alerta" style="display:none" class="" data-estado="<?php echo $alerta; ?>" data-clase="<?php echo $clase; ?>">
          
            <p><strong></strong>  <span></span></p>

          </div>
        </div>
    </div>



    <div class="validadorformularios">
    
        {!!Form::open(['action' => 'InstitucionController@store'])!!}
        <div class="panel panel-default">
            <div class="panel-body">
                
                 <div class="col-md-6">
                    {{Form::label('Nombre de la institucion*')}}
                    {{Form::text('nomb_inst',null,['class'=>'form-control camporequerido','type'=>'text'])}}
                </div>

                <div class="col-md-6">
                    {{Form::label('Correo de la institucion*')}}
                    {{Form::text('correo_inst',null,['class'=>'form-control camporequerido solomails','type'=>'text'])}}
                </div>
               
                <div class="col-md-6">
                    {{Form::label('Telefono de la institucion*')}}
                    {{Form::text('telefono_inst',null,['class'=>'form-control camporequerido solo-numero','type'=>'text'])}}
                </div>

                <div class="col-md-6">
                    {{Form::label('Direccion de la Institucion*')}}
                    {{Form::text('direccion_inst',null,['class'=>'form-control camporequerido','type'=>'text'])}}
                </div>         
                
               
            </div>
        </div>

        <div class="col-md-12 msnrequeridos">
            <p>Todos los campos con (*) son obligatorios</p>
        </div>

        <div class="col-md-offset-5">
            {{Form::submit('Enviar',['class'=>'btn btn-success', 'id'=>'singlebutton'])}}
        </div>

        {!! Form::close() !!}

    </div>

@endsection