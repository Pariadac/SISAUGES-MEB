<?php

namespace SISAUGES\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use SISAUGES\ClasificacionActividad;
use SISAUGES\Http\Requests;
use SISAUGES\Http\Controllers\Controller;
use SISAUGES\SectorActividad;
use Illuminate\Support\Facades\DB;

class ClasificacionActividadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $clasificacionActividad = DB::table('clasificacion_actividad')
                                            ->join('sector_actividad',
                                                    'sector_actividad.id_sector_ac','=',
                                                    'clasificacion_actividad.id_sector_ac')
                                            ->select('clasificacion_actividad.*',
                                                        'sector_actividad.descripcion_sector')
                                            ->paginate(5);
        $clasificacionActividad->setPath('clasificacionActividad');
        return view('clasificacionactividad.index')->with('clasificacionActividad',$clasificacionActividad);
    }

    public function create()
    {
        $sectorActividad = SectorActividad::all()->pluck('descripcion_sector','id_sector_ac');
        return view('clasificacionactividad.crear')->with(['sectorActividad'=>$sectorActividad]);
    }

    public function store()
    {
        $clasificacionActividad = new ClasificacionActividad();
        $clasificacionActividad->descripcion_clasificacion = \Request::Input('descripcionClasificacion');
        $clasificacionActividad->id_sector_ac = \Request::Input('sectorActividad');
        $clasificacionActividad->save();
        return redirect('clasificacionActividad')->with('status','Clasificación Creada con Exito');
    }

    public function edit($id)
    {
        $clasificacionActividad = DB::table('clasificacion_actividad')
                                    ->join('sector_actividad',
                                            'sector_actividad.id_sector_ac','=',
                                            'clasificacion_actividad.id_sector_ac')
                                    ->select('clasificacion_actividad.*',
                                             'sector_actividad.descripcion_sector')
                                    ->where('clasificacion_actividad.id_clasificacion_actividad','=',$id )->first();
        $sectorActividad = SectorActividad::all()->pluck('descripcion_sector','id_sector_ac');


        return view('clasificacionactividad.editar')->with(['clasificacionActividad'=>$clasificacionActividad,
                                                            'sectorActividad'=>$sectorActividad]);
    }

    public function update($id)
    {
        $clasificacionActividad = ClasificacionActividad::find($id);
        $clasificacionActividad->descripcion_clasificacion = \Request::Input('descripcionClasificacion');
        $clasificacionActividad->id_sector_ac = \Request::Input('sectorActividad');
        $clasificacionActividad->save();
        return redirect('clasificacionActividad')->with('message','Clasificación modificada con exito');
    }

    public function destroy($id)
    {
        $clasificacionActividad = ClasificacionActividad::find($id);
        $clasificacionActividad->delete();
        return redirect('clasificacionActividad')->with('message','La clasificacion ha sido eliminada con exito');
    }
}
