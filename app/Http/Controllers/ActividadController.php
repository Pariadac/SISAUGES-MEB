<?php

namespace SISAUGES\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use SISAUGES\Actividad;
use SISAUGES\Http\Requests;
use SISAUGES\Http\Controllers\Controller;
use SISAUGES\Institucion;
use SISAUGES\Representante;
use SISAUGES\SectorActividad;

class ActividadController extends Controller
{
    protected $sector;
    protected $representante;

    public function __construct()
    {
        $this->middleware('auth');
        $this->sector           =   SectorActividad::all()->pluck('descripcion_sector','id_sector_ac');
        $this->representante    =   Representante::all()->pluck('nombre','id_representante');
    }

    public function index(/*Request $request*/)
    {
        //$nombreActividad=$request->input('nombreActividad');
        $actividad = Actividad::with('sector')->orderBy('id_actividad','asc')->paginate(5);
        $actividad->setPath('actividad');
        return view('actividad.index')->with('actividad',$actividad);
    }

    public function create()
    {
        return view('actividad.crear')->with(['sectorActividad' =>  $this->sector,
                                              'representante'   =>  $this->representante]);
    }

    public function store()
    {
        $actividad = new Actividad();
        $actividad->nombre_actividad    = \Request::Input('nombreActividad');
        $actividad->status_actividad    = \Request::Input('statusActividad');
        $actividad->permiso_actividad   = \Request::Input('permisoActividad');
        $actividad->sector()->associate(\Request::Input('sectorActividad'));
        $actividad->save();

        $representante = \Request::Input('representante');

        foreach($representante as $rep)
        {
            $actividad->representantes()->attach($rep);
        }


        return redirect('actividad')->with('message','Se ha agregado una Actividad con exito');
    }

    public function edit($id)
    {
        $actividad = Actividad::find($id);
        $representanteSeleccionado = Actividad::find($id)->representantes()
                                    ->pluck('representante_actividad.id_representante')
                                    ->toArray();
        return view('actividad.editar')->with([ 'actividad'                 =>  $actividad,
                                                'sectorActividad'           =>  $this->sector,
                                                'representante'             =>  $this->representante,
                                                'representanteSeleccionado' =>  $representanteSeleccionado
                                                ]);
    }

    public function update($id)
    {
        $actividad = Actividad::find($id);
        $actividad->nombre_actividad    = \Request::Input('nombreActividad');
        $actividad->status_actividad    = \Request::Input('statusActividad');
        $actividad->permiso_actividad   = \Request::Input('permisoActividad');
        $actividad->id_sector_ac        = \Request::Input('sectorActividad');
        $actividad->save();

        $representante = \Request::Input('representante');
        $actividad->representantes()->sync($representante);
        return redirect('actividad')->with('message','Se ha modificado una Actividad con exito');
    }

    public function destroy($id)
    {
        $actividad = Actividad::find($id);
        $actividad->representantes()->detach();
        $actividad->delete();
        return redirect('actividad')->with('message','Se ha eliminado una actividad con exito');
    }
}
