<?php

namespace SISAUGES\Http\Controllers;

use Illuminate\Http\Request;

use SISAUGES\Http\Requests;
use SISAUGES\Http\Controllers\Controller;
use SISAUGES\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuario = User::all();
        return view('users.index')->with('usuario',$usuario);
    }

    public function create()
    {
        return view('users.crear');
    }

    public function store()
    {
        $usuario = new User();
        $usuario->cedula =\Request::Input('cedula');
        $usuario->nombre=\Request::Input('nombre');
        $usuario->apellido=\Request::Input('apellido');
        $usuario->email=\Request::Input('email');
        $usuario->telefono=\Request::Input('telefono');
        $usuario->username=\Request::Input('nombreUsuario');
        $usuario->password=\Hash::make(\Request::Input('password'));

        $usuario->save();
        return redirect('usuario')->with('message','Se ha agregado a un Usuario con Exito');
    }

    public function edit($id)
    {
        $usuario = User::find($id);
        return view('users.editar')->with('usuario',$usuario);
    }

    public function update($id)
    {
        $usuario = User::find($id);
        $usuario->cedula=\Request::Input('cedula');
        $usuario->nombre=\Request::Input('nombre');
        $usuario->apellido=\Request::Input('apellido');
        $usuario->email=\Request::Input('email');
        $usuario->telefono=\Request::Input('telefono');
        $usuario->password = \Hash::make(\Request::Input('password'));
        $usuario->save();
        return redirect('usuario')->with('message','El usuario N°'.$id.' ha sido editado');
    }

    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        return redirect('usuario')->with('message','El usuario'.$id.' ha sido eliminado con exito');
    }
}
