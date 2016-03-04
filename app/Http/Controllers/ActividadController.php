<?php

namespace SISAUGES\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use SISAUGES\Actividad;
use SISAUGES\Http\Requests;
use SISAUGES\Http\Controllers\Controller;
use SISAUGES\SectorActividad;


class ActividadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $nombreActividad=$request->input('nombreActividad');
        $actividad = Actividad::with('sector')->where('id_actividad','=',2)->get();

//        $actividad->setPath('');

        return view('actividad.index')->with('actividad',$actividad);
    }

    public function create()
    {
        $sectorActividad = SectorActividad::all()->pluck('descripcion_sector','id_sector_ac');
        return view('actividad.crear')->with(['sectorActividad'=>$sectorActividad]);
    }

    public function store()
    {
        $actividad = new Actividad();
        $actividad->nombre_actividad = \Request::Input('nombreActividad');
        $actividad->status_actividad = \Request::Input('statusActividad');
        $actividad->permiso_actividad = \Request::Input('permisoActividad');
        //$actividad->id_sector_ac = \Request::Input('sectorActividad');
        $actividad->sector()->associate(\Request::Input('sectorActividad'));
        $actividad->save();
        return redirect('actividad')->with('message','Se ha agregado una Actividad con exito');
    }

    public function edit($id)
    {
        $actividad = Actividad::find($id);
        return view('actividad.editar')->with('actividad', $actividad);
    }

    public function update($id)
    {
        $actividad = Actividad::find($id);
        $actividad->nombre_actividad = \Request::Input('nombreActividad');
        $actividad->status_actividad = \Request::Input('statusActividad');
        $actividad->permisos_actividad = \Request::Input('permisosActividad');
        $actividad->id_tipo_actividad = \Request::Input('tipoActividad');
        $actividad->id_clasificacion_actividad =\Request::Input('clasificacionActividad');
        $actividad->id_sector_actividad = \Request::Input('sectorActividad');
        $actividad->save();
        return redirect('actividad')->with('message','Se ha modificado una Actividad con exito');
    }

    public function destroy($id)
    {
        $actividad = Actividad::find($id);
        $actividad->destroy();
        return redirect('actividad')->with('message','Se ha eliminado una actividad con exito');
    }
}
