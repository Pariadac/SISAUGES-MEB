@extends('layouts.app')
@section('title', 'sector Actividad')
@section('content')


    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    {!!Form::open(['action' => 'SectorActividadController@store'])!!}
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="col-md-6">
                {{Form::label('descripcionSector','Sector de la Actividad')}}
                {{Form::text('descripcionSector',null,['class'=>'form-control','type'=>'text'])}}
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