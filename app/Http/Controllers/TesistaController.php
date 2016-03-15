<?php

namespace SISAUGES\Http\Controllers;

use Illuminate\Http\Request;

use SISAUGES\Actividad;
use SISAUGES\Http\Requests;
use SISAUGES\Http\Controllers\Controller;
use SISAUGES\Tesista;

class TesistaController extends Controller
{
    protected $actividad;
    public function __construct()
    {
        $this->middleware('auth');
        $this->actividad = Actividad::all()->pluck('nombre_actividad','id_actividad');
    }

    public function index()
    {
        $tesista=Tesista::with('actividad')->get();
        return view('tesista.index')->with('tesista',$tesista);
    }

    public function create()
    {
        return view('tesista.crear')->with(['actividad'=>$this->actividad]);
    }

    public function store()
    {
        $tesista=new Tesista();
        $tesista->cedula=\Request::Input('cedula');
        $tesista->nombre=\Request::Input('nombre');
        $tesista->apellido=\Request::Input('apellido');
        $tesista->email=\Request::Input('email');
        $tesista->telefono=\Request::Input('telefono');
        $tesista->carrera_tesista=\Request::Input('carrera');
        $tesista->semestre_tesista=\Request::Input('semestre');
        $tesista->actividad()->associate(\Request::Input('actividad'));
        $tesista->save();
        return redirect('tesista')->with('message','Se ha agregado el tesista con exito');


    }

    public function edit($id)
    {
        $tesista = Tesista::find($id);
        return view('tesista.editar')->with(['tesista'=>$tesista,'actividad'=>$this->actividad]);
    }

    public function update($id)
    {
        $tesista = Tesista::find($id);
        $tesista->cedula=\Request::Input('cedula');
        $tesista->nombre=\Request::Input('nombre');
        $tesista->apellido=\Request::Input('apellido');
        $tesista->email=\Request::Input('email');
        $tesista->telefono=\Request::Input('telefono');
        $tesista->carrera_tesista=\Request::Input('carrera');
        $tesista->semestre_tesista=\Request::Input('semestre');
        $tesista->id_actividad = \Request::Input('actividad');
        $tesista->save();
        return redirect('tesista')->with('message','El tesista N°'.$id.' ha sido editado');
    }

    public function destroy($id)
    {
        $tesista = Tesista::find($id);
        $tesista->delete();
        return redirect('tesista')->with('message','El Tesista '.$id.' ha sido eliminado con exito');
    }
}
