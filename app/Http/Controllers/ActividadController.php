<?php

namespace SISAUGES\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use SISAUGES\Actividad;
use SISAUGES\ClasificacionActividad;
use SISAUGES\Http\Requests;
use SISAUGES\Http\Controllers\Controller;
use SISAUGES\SectorActividad;
use SISAUGES\TipoActividad;


class ActividadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $nombreActividad=$request->input('nombreActividad');

        $actividad=DB::table('actividad')
            ->join( 'tipo_actividad','actividad.id_tipo_actividad','=','tipo_actividad.id_tipo_actividad')
            ->join( 'clasificacion_actividad','actividad.id_clasificacion_actividad',
                    '=','clasificacion_actividad.id_clasificacion_actividad')
            ->join( 'sector_actividad','actividad.id_sector_ac','=','sector_actividad.id_sector_ac')
            ->select( 'actividad.*','tipo_actividad.descripcion_actividad',
                      'clasificacion_actividad.descripcion_clasificacion','sector_actividad.descripcion_sector')
            ->where('actividad.nombre_actividad','=','%'.$nombreActividad.'%')
            ->paginate(5);

//        $actividad->setPath('');

        return view('actividad.index')->with('actividad',$actividad);
    }

    public function create()
    {
        $tipoActividad = TipoActividad::all()->pluck('descripcion_actividad','id_tipo_actividad');
        $clasificacionActividad = ClasificacionActividad::all()->pluck('descripcion_clasificacion','id_clasificacion_actividad');
        $sectorActividad = SectorActividad::all()->pluck('descripcion_sector','id_sector_ac');
        return view('actividad.crear')->with([ 'tipoActividad'=>$tipoActividad,
                                                'clasificacionActividad'=>$clasificacionActividad,
                                                'sectorActividad'=>$sectorActividad]);
    }

    public function store()
    {
        $actividad = new Actividad();
        $actividad->nombre_actividad = \Request::Input('nombreActividad');
        $actividad->status_actividad = \Request::Input('statusActividad');
        $actividad->permisos_actividad = \Request::Input('permisosActividad');
        $actividad->id_tipo_actividad = \Request::Input('tipoActividad');
        $actividad->id_clasificacion_actividad =\Request::Input('clasificacionActividad');
        $actividad->id_sector_actividad = \Request::Input('sectorActividad');
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
