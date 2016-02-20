<?php

namespace SISAUGES\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use SISAUGES\Http\Requests;
use SISAUGES\Http\Controllers\Controller;
use SISAUGES\Institucion;

class InstitucionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $mostrar = DB::table('institucion')->get();

        return view('institucion.principal',compact('mostrar'));
        
    }

    public function create()
    {
        
      return view('institucion.formulario');

    }

    public function store(Request $request)
    {
       
        $nombre = $request->input('nomb_inst');
        $direccion = $request->input('direccion_inst');
        $correo = $request->input('correo_inst');
        $telefono = $request->input('telefono_inst');
        $representante = $request->input('representante_inst');


        $conteo=DB::table('representante')->where('id_representante', '=', $representante)->count();

        var_dump($conteo);

        if ($conteo!=0) 
        {
            DB::table('institucion')->insert(['nombre_institucion'=>$nombre,'direccion_institucion'=>$direccion,'correo_institucional'=>$correo,'telefono_institucion'=>$telefono,'id_representante'=>$representante]);
            echo "registro exitoso";
        }

        else
        {
              echo "registro fllido no esxite representante";
        }

        
        
    }

    public function edit($id)
    {
        echo "hola";

    }

    public function update($id)
    {
        

    }

    public function destroy($id)
    {
       echo "eliminar";

    }
}
