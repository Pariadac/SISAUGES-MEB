<?php

namespace SISAUGES\Http\Controllers;

use Illuminate\Http\Request;

use SISAUGES\Http\Requests;
use SISAUGES\Http\Controllers\Controller;
use SISAUGES\NivelUsuario;
use SISAUGES\User;
use Illuminate\Support\Facades\Crypt;


class UserController extends Controller
{

    protected $nivel;
    public function __construct()
    {
        $this->middleware('auth');
        $this->nivel = NivelUsuario::all()->pluck('descripcion_nivel_usuario','id_nivel_de_usuario');
    }

    public function index()
    {
        $usuario = User::all();
        return view('users.index')->with('usuario',$usuario);
    }

    public function create()
    {
        return view('users.crear')->with('nivel',$this->nivel);
    }

    public function store()
    {
        $usuario = new User();
        $usuario->cedula =\Crypt::encrypt(\Request::Input('cedula'));
        $usuario->nombre=\Request::Input('nombre');
        $usuario->apellido=\Request::Input('apellido');
        $usuario->email=\Request::Input('email');
        $usuario->telefono=\Request::Input('telefono');
        $usuario->username=\Request::Input('nombreUsuario');
        $usuario->password=\Hash::make(\Request::Input('password'));
        $usuario->save();

        $nivel=\Request::Input('nivelUsuario');

        foreach($nivel as $niveles)
        {
            $usuario->nivelUsuarios()->attach([$niveles]);
        }


        return redirect('usuario')->with('message','Se ha agregado a un Usuario con Exito');
    }

    public function edit($id)
    {
        $usuario = User::find($id);
        $usuario_seleccionado=User::find($id)->nivelUsuarios()->pluck('usuarios_niveles.id_nivel_de_usuario')->toArray();

        return view('users.editar')->with(['usuario'=>$usuario,'nivel'=>$this->nivel,
                                        'usuario_seleccionado'=>$usuario_seleccionado]);
    }

    public function update($id, Request $request)
    {
        $usuario = User::find($id);
        $usuario->cedula=Crypt::encrypt(\Request::Input('cedula'));
        $usuario->nombre=\Request::Input('nombre');
        $usuario->apellido=\Request::Input('apellido');
        $usuario->email=\Request::Input('email');
        $usuario->telefono=\Request::Input('telefono');
        $usuario->password = \Hash::make(\Request::Input('password'));
        $usuario->save();
        $nivel = $request->input('nivelUsuario');

        $usuario->nivelUsuarios()->sync($nivel);

        return redirect('usuario')->with('message','El usuario N°'.$id.' ha sido editado');
    }

    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->nivelUsuarios()->detach();
        $usuario->delete();

        return redirect('usuario')->with('message','El usuario'.$id.' ha sido eliminado con exito');
    }
}
