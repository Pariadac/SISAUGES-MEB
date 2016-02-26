@extends('layouts.app')

@section('content')


    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    {!!Form::open(['url' => 'institucion/edita/'.$institucion->id_institucion])!!}
    <div class="panel panel-default">
        <div class="panel-body">
            
             <div class="col-md-6">
                {{Form::label('Nombre de la institucion')}}
                {{Form::text('nomb_inst',$institucion->nombre_institucion,['class'=>'form-control','type'=>'text'])}}
            </div>
           
            <div class="col-md-6">
                {{Form::label('Direccion de la Institucion')}}
                {{Form::text('direccion_inst',$institucion->direccion_institucion,['class'=>'form-control','type'=>'text'])}}
            </div>
            
            <div class="col-md-6">
                {{Form::label('Correo de la institucion')}}
                {{Form::text('correo_inst',$institucion->correo_institucional,['class'=>'form-control','type'=>'text'])}}
            </div>
           
            <div class="col-md-6">
                {{Form::label('Telefono de la institucion')}}
                {{Form::text('telefono_inst',$institucion->telefono_institucion,['class'=>'form-control','type'=>'text'])}}
            </div>
           
        </div>
    </div>


    <div class="col-md-offset-5">
        {{Form::submit('Enviar',['class'=>'btn btn-primary'])}}
    </div>

    {!! Form::close() !!}

@endsection