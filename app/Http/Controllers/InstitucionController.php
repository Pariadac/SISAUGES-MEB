<?php
/**
 * Copyright (c) 2016 Ely Colmenarez
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */
namespace SISAUGES\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use SISAUGES\Http\Requests;
use SISAUGES\Http\Controllers\Controller;
use SISAUGES\Institucion;
use SISAUGES\Representante;
/**
 * Class UserController
 *
 * Esta clase se diseño para manejar las transancciones de la institución en la base de
 * datos, estas pueden ser agregar,
 * modificar, eliminar o listar.
 *
 * @author Ely Colmenarez ElyJColmenarez@Gmail.com
 * @copyright 2016 Ely Colmenarez
 * @package SISAUGES\Http\Controllers
 */
class InstitucionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Metodo diseñado para direccionar a la pantalla principal del modulo
     *
     * Este metodo redirige a la pantalla principal del modulo institución
     * esta pantalla mostrara un listado de la institución agregada y un boton para modificar
     * y eliminar
     *
     * @param void
     *
     * @return $institución devuelve objeto de tipo institución
     */
    public function index()
    {

        $mensaje=false;

        $mostrar = DB::table('institucion')->get();

        return view('institucion.principal',compact('mostrar','mensaje'));
        
    }
    /**
     * Metodo diseñado para direccionar a la pantalla de agregar una institución
     *
     * Este metodo redirige a la pantalla agregar institución
     * la cual mostrara un formulario con los campos necesarios para almacenar
     * en la base de datos
     *
     * @param void
     *
     * @return $institución devuelve objeto de tipo institución
     */
    public function create()
    {
    

        return view('institucion.formulario');

    }
    /**
     * Metodo diseñado para almacenar la institución en la base de datos
     *
     * @param void
     *
     * @return $menssage retorna el resultado de la operación
     */
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
    /**
     * Metodo diseñado para direccionar a la pantalla de editar una institución
     *
     * Este metodo redirige a la pantalla editar institución
     * la cual mostrara un formulario con los datos del representate seleccionado,
     * con los campos necesarios para almacenar en la base de datos
     *
     * @param $id codigo de asociación de la institución en la base de datos
     *
     * @return $array un arreglo de objetos de los datos de la institución
     */
    public function edit($id)
    {
        $institucion = Institucion::find($id);
        return view('institucion.editar')->with('institucion',$institucion);

    }
    /**
     * Metodo diseñado para actualizar los datos de un institución en la base de datos
     *
     * @param $id codigo de asociación de la institución en la base de datos, $request datos enviados atravez del formulario
     *
     * @return $menssage retorna el resultado de la operación.
     */
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
    /**
     * Metodo diseñado para eliminar los datos de un institución en la base de datos
     *
     * @param $id codigo de asociación del institución en la base de datos
     *
     * @return $menssage retorna el resultado de la operación.
     */
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
