@extends('layouts.app')
@section('title','Editar Sector')
@section('content')

    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    {!!Form::open(['url' => 'actualizarSectorActividad/'.$sectorActividad->id_sector_ac])!!}

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                {{Form::label('descripcionSector','Descripción del Sector de la Actividad')}}
                {{Form::text('descripcionSector',$sectorActividad->descripcion_sector,['class'=>'form-control','type'=>'text'])}}
            </div>
        </div>
    </div>


    <div class="col-md-offset-5">
        {{Form::submit('Enviar',['class'=>'btn btn-primary'])}}
    </div>

    {!! Form::close() !!}

@endsection