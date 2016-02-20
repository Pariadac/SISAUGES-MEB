<?php

namespace SISAUGES\Http\Controllers;

use Illuminate\Http\Request;

use SISAUGES\ClasificacionActividad;
use SISAUGES\Http\Requests;
use SISAUGES\Http\Controllers\Controller;
use SISAUGES\TipoActividad;
use Illuminate\Support\Facades\DB;

class TipoActividadController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $buscarTipoActividad = $request->input('buscarTipoActividad');
        $tipoActividad = DB::table('tipo_actividad')
            ->join( 'clasificacion_actividad','tipo_actividad.id_clasificacion_actividad','=','clasificacion_actividad.id_clasificacion_actividad')
            ->select('tipo_actividad.*','clasificacion_actividad.descripcion_clasificacion')
//            ->where('tipo_actividad.descripcion_actividad','=','%'.$buscarTipoActividad.'%')
            ->paginate(5);
        $tipoActividad->setPath('tipoActividad');
//        dd($tipoActividad);
        return view('tipoactividad.index')->with('tipoActividad',$tipoActividad);
    }

    public function create()
    {
        $clasificacionActividad = ClasificacionActividad::all()->pluck('descripcion_clasificacion','id_clasificacion_actividad');
        return view('tipoactividad.crear')->with('clasificacionActividad',$clasificacionActividad);
    }

    public function store()
    {
        $tipoActividad = new TipoActividad();
        $tipoActividad->descripcion_actividad = \Request::Input('descripcion');
        $tipoActividad->id_clasificacion_actividad = \Request::Input('clasificacionActividad');
        $tipoActividad->save();
        return redirect('tipoActividad')->with('message','El tipo de actividad se ha creado con exito');
    }

    public function edit($id)
    {
        $tipoActividad = TipoActividad::find($id);
        $clasificacionActividad = ClasificacionActividad::all()->pluck('descripcion_clasificacion','id_clasificacion_actividad');
        return view('tipoactividad.editar')->with(['tipoActividad'=>$tipoActividad,'clasificacionActividad'=>$clasificacionActividad]);
    }

    public function update($id)
    {
        $tipoActividad = TipoActividad::find($id);
        $tipoActividad->descripcion_actividad = \Request::Input('descripcion');
        $tipoActividad->id_clasificacion_actividad = \Request::input('clasificacionActividad');
        $tipoActividad->save();
        return redirect('tipoActividad')->with('message','El tipo de Actividad ha sido modificada con exito');

    }

    public function destroy($id)
    {
        $tipoActividad = TipoActividad::find($id);
        $tipoActividad->delete();
        return redirect('tipoActividad')->with('message','La eliminacion se ha realizado con exito');
    }
}
