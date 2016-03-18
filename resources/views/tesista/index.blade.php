@extends('layouts.app')
@section('title','Indice Tesistas')
@section('content')

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Tesista <small>pagina Principal</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Tesista</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->


    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif
    <table class="table table-responsive">
        <tr>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Actividad Relacionada</th>
            <th class="tablaboton">Acción</th>
        </tr>
        @foreach($tesista as $tes)
            <tr>
                <td>{{$tes->cedula}}</td>
                <td>{{$tes->nombre}}</td>
                <td>{{$tes->apellido}}</td>
                <td>{{$tes->email}}</td>
                <td>{{$tes->actividad->nombre_actividad}}</td>
                <td class="misbotones">
                    {!! Html::link('tesista/editar/'.$tes->id_tesista, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')) !!}

                    {!! Form::open(array('url' =>'tesista/eliminar/'.$tes->id_tesista, 'method' => 'DELETE')) !!}
                    <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
@endsection