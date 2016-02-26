<?php

namespace SISAUGES\Http\Controllers;

use Illuminate\Http\Request;

use SISAUGES\ClasificacionActividad;
use SISAUGES\Http\Requests;
use SISAUGES\Http\Controllers\Controller;
use SISAUGES\SectorActividad;
use Illuminate\Support\Facades\DB;

class SectorActividadController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sectorActividad = DB::table('sector_actividad')->orderBy('id_sector_ac')->get();
        return view('sectoractividad.index')->with('sectorActividad',$sectorActividad);
    }

    public function create()
    {
        return view('sectoractividad.crear');
    }

    public function store()
    {
        $sectorActividad = new SectorActividad();
        $sectorActividad->descripcion_sector = \Request::Input('descripcionSector');
        $sectorActividad->save();
        return redirect('sectorActividad')->with('message','Se ha realizado la insercion con exito');

    }

    public function edit($id)
    {
        $sectorActividad = SectorActividad::find($id);
        return view('sectoractividad.editar')->with(['sectorActividad'=>$sectorActividad]);
    }

    public function update($id)
    {
        $sectorActividad = SectorActividad::find($id);
        $campo = $sectorActividad->descripcion_sector;
        $sectorActividad->descripcion_sector = \Request::Input('descripcionSector');
        $sectorActividad->save();
        return redirect('sectorActividad')
                ->with('message','Se ha realizado la modificacion del campo: '. $campo
                        .' a: '.$sectorActividad->descripcion_sector.' con éxito');
    }

    public function destroy($id)
    {
        $sectorActividad = SectorActividad::find($id);
        $sectorActividad->delete();
        return redirect('sectorActividad')->with('message','Se ha realizado una eliminacion con exito');
    }
}
