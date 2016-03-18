@extends('layouts.app')
@section('title', 'Indice de Representante')
@section('content')


    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Representante <small>pagina Principal</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Representante</label>
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
            <th>Representante N°</th>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th class="tablaboton">Acción</th>
        </tr>
        @foreach($representante as $rep)
            <tr>
                <td>{{$rep->id_representante}}</td>
                <td>{{$rep->cedula}}</td>
                <td>{{$rep->nombre}}</td>
                <td>{{$rep->apellido}}</td>
                <td>{{$rep->email}}</td>
                <td class="misbotones">
                    {!! Html::link('representante/editar/'.$rep->id_representante, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')) !!}
                </td>
            </tr>
        @endforeach
    </table>
@endsection