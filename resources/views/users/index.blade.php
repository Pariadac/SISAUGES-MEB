@extends('layouts.app')
@section('title','Indice de Usuarios')

@section('content')


    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Usuarios <small>pagina Principal</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Ubicacion:/ <label>Usuarios</label>
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->


    @if (Session::has('message'))
        <div class="alert alert-success">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-bordered table-responsive">
        <tr>
            <th>Usuario N°</th>
            <th>Cedula</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Nombre de Usuario</th>
            <th class="tablaboton">Acción</th>
        </tr>
        @foreach($usuario as $user)
            <tr>
                <td>{{$user->id_usuario}}</td>
                <td>{{\Crypt::decrypt($user->cedula)}}</td>
                <td>{{$user->nombre}}</td>
                <td>{{$user->apellido}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->username}}</td>
                <td class="misbotones">
                    {!! Html::link('usuario/editar/'.$user->id_usuario, 'Editar', array('class' => 'glyphicon glyphicon-pencil btn btn-warning btn-xs')) !!}
                    
                    {!! Form::open(array('url' =>'usuario/eliminar/'.$user->id_usuario, 'method' => 'DELETE')) !!}
                    <button type="submit" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </table>
@endsection