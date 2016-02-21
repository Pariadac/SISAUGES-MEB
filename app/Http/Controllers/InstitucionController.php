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

        $mensaje=false;

        $mostrar = DB::table('institucion')->get();

        return view('institucion.principal',compact('mostrar','mensaje'));
        
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
        $institucion = Institucion::find($id);
        return view('institucion.editar')->with('institucion',$institucion);

    }

    public function update($id)
    {
        $institucion = Institucion::find($id);

        $institucion->nombre_institucion=\Request::Input('nomb_inst');
        $institucion->direccion_institucion=\Request::Input('direccion_inst');
        $institucion->correo_institucional=\Request::Input('correo_inst');
        $institucion->telefono_institucion=\Request::Input('telefono_inst');
        $institucion->save();

        $mensaje='La actividad N°'.$id.' ha sido editado con exito';

        $mostrar = DB::table('institucion')->get();

        return view('institucion.principal',compact('mostrar','mensaje'));
    }

    public function destroy($id)
    {
       
        $institucion = Institucion::find($id);
        $validar=$institucion->delete();
       
       
        if ($validar) {
            $mensaje='La actividad N° '.$id.' ha sido eliminado con exito';
        }else{
            $mensaje="ocurrio un error";
        }


        $mostrar = DB::table('institucion')->get();

        return view('institucion.principal',compact('mostrar','mensaje'));

    }


    public function buscar()
    {

        $data=Input::all();

        $var= $data['busqueda'];

        $mostrar= DB::table('institucion')->where('nombre_institucion','like','%'.$var.'%')->get();
        
        foreach ($mostrar as $key) {

            echo '

            <tr class="borrables">
                <td>'.$key->id_institucion.'</td> 
                <td>'.$key->nombre_institucion.'</td> 
                <td>'.$key->direccion_institucion.'</td> 
                <td>'.$key->correo_institucional.'</td> 
                <td>'.$key->telefono_institucion.'</td> 
                <td>'.$key->id_representante.'</td>
                <td></td>
                <td><a href="/institucion/editar/'.$key->id_institucion.'">Modificar</a></td>
                <td><a href="/institucion/eliminar/'.$key->id_institucion.' ">Eliminar</a></td>  
            </tr>

            ';


        }

    }
}
