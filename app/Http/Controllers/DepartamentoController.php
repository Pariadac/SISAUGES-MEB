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

use SISAUGES\Http\Requests;
use SISAUGES\Http\Controllers\Controller;
use SISAUGES\Departamento;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
/**
 * Class DepartamentoController
 *
 * Esta clase se diseño para manejar las transancciones del departamento en la base de
 * datos, estas pueden ser agregar,
 * modificar, eliminar o listar.
 *
 * @author Ely Colmenarez ElyJColmenarez@Gmail.com
 * @copyright 2016 Ely Colmenarez
 * @package SISAUGES\Http\Controllers
 */
class DepartamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Metodo diseñado para direccionar a la pantalla principal del modulo
     *
     * Este metodo redirige a la pantalla principal del modulo departamento
     * esta pantalla mostrara un listado de los departamentos agregados y un boton para modificar
     * y eliminar
     *
     * @param void
     *
     * @return $departamento devuelve objeto de tipo departamento
     */
    public function index()
    {

        $mostrar = Departamento::all();

        return view('departamento.principal',compact('mostrar'));

    }
    /**
     * Metodo diseñado para direccionar a la pantalla de agregar un departamento
     *
     * Este metodo redirige a la pantalla agregar departamento
     * la cual mostrara un formulario con los campos necesarios para almacenar
     * en la base de datos
     *
     * @param void
     *
     * @return $departamento devuelve objeto de tipo departamento
     */
    public function create()
    {

        return view('departamento.formulario');

    }
    /**
     * Metodo diseñado para almacenar el departamento en la base de datos
     *
     * @param void
     *
     * @return $menssage retorna el resultado de la operación
     */
    public function store(Request $request)
    {


        $tb=DB::table('departamento')->max('id_departamento');


        if ($tb)
        {

            $id=Departamento::find($tb);

            if ($request->input('nomb')==$id->descripcion_departamento)
            {
                

            }else{


                $inst=new Departamento();

                $inst->descripcion_departamento=$request->input('nomb');

                $inst->save();


            }
        }else
        {


            $inst=new Departamento();

            $inst->descripcion_departamento=$request->input('nomb');

            $inst->save();

        }


        $retorno=0;


        return view('departamento.formulario',compact('retorno'));

    }
    /**
     * Metodo diseñado para direccionar a la pantalla de editar un departamento
     *
     * Este metodo redirige a la pantalla editar departamento
     * la cual mostrara un formulario con los datos del representate seleccionado,
     * con los campos necesarios para almacenar en la base de datos
     *
     * @param $id codigo de asociación del departamento en la base de datos
     *
     * @return $array un arreglo de objetos de los datos del departamento
     */
    public function edit($id)
    {
        $departamento=Departamento::find($id);
        return view('departamento.editar')->with('departamento',$departamento);

    }
    /**
     * Metodo diseñado para actualizar los datos de un departamento en la base de datos
     *
     * @param $id codigo de asociación del departamento en la base de datos, $request datos enviados atravez del formulario
     *
     * @return $menssage retorna el resultado de la operación.
     */
    public function update($id)
    {

        $departamento=Departamento::find($id);

        $id->descripcion_departamento=\Request::Input('nomb');

        $departamento->save();


        $retorno=0;

        return view('departamento.formulario',compact('retorno'));

    }
    /**
     * Metodo diseñado para eliminar los datos de un departamento en la base de datos
     *
     * @param $id codigo de asociación del departamento en la base de datos
     *
     * @return $menssage retorna el resultado de la operación.
     */
    public function destroy($id)
    {

        $departamento=Departamento::find($id);

        $retorno=0;
        
        if (isset($departamento)) {

            $validar=$departamento->delete();
           
            if ($validar) {
                $retorno=0;
            }else{
                $retorno=1;
            }

        }


        $mostrar = Departamento::all();

        return view('departamento.principal',compact('mostrar'));

    }
}
