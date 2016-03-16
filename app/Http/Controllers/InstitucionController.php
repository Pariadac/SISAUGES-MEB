<?php

namespace SISAUGES\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use SISAUGES\Http\Requests;
use SISAUGES\Http\Controllers\Controller;
use SISAUGES\Institucion;
use SISAUGES\Representante;

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
       
        $tb=DB::table('institucion')->max('id_institucion');


        if ($tb) {

            $id=Institucion::find($tb);

            if ($request->input('nomb_inst')==$id->nombre_institucion&& $id->direccion_institucion == $request->input('direccion_inst')&& $id->correo_institucional == $request->input('correo_inst')&&$id->telefono_institucion == $request->input('telefono_inst'))
            {
                

            }else{


                $inst=new Institucion();

                $inst->nombre_institucion = $request->input('nomb_inst');
                $inst->direccion_institucion = $request->input('direccion_inst');
                $inst->correo_institucional = $request->input('correo_inst');
                $inst->telefono_institucion = $request->input('telefono_inst');

                $inst->save();


            }
        }else{


            $inst=new Institucion();

            $inst->nombre_institucion = $request->input('nomb_inst');
            $inst->direccion_institucion = $request->input('direccion_inst');
            $inst->correo_institucional = $request->input('correo_inst');
            $inst->telefono_institucion = $request->input('telefono_inst');

            $inst->save();

        }


        $retorno=0;


        return view('institucion.formulario',compact('retorno'));
        
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

        $mostrar= DB::table('institucion')->where('nombre_institucion','ILIKE','%'.$var.'%')->get();
        
        foreach ($mostrar as $key) {

            echo '

            <tr class="borrables">
                <td >'.$key->nombre_institucion.'</td> 
                <td >'.$key->direccion_institucion.'</td> 
                <td >'.$key->correo_institucional.'</td> 
                <td >'.$key->telefono_institucion.'</td> 
                <td >
                    <a href="/institucion/editar/'.$key->id_institucion.'" name="singlebutton" class="glyphicon glyphicon-list btn btn-primary btn-xs">Modificar</a>
                    <a href="/institucion/eliminar/'.$key->id_institucion.' name="singlebutton" class="glyphicon glyphicon-trash btn btn-danger btn-xs">Eliminar</a>
                </td>  
            </tr>

            ';


        }

    }
}
