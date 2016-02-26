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
use SISAUGES\Representante;

/**
 * Class RepresentanteController
 *
 * Esta clase se diseño para manejar las transancciones del representante en la base de
 * datos, estas pueden ser agregar,
 * modificar, eliminar o listar.
 *
 * @author Ely Colmenarez ElyJColmenarez@Gmail.com
 * @copyright 2016 Ely Colmenarez
 * @package SISAUGES\Http\Controllers
 */
class RepresentanteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Metodo diseñado para direccionar a la pantalla principal del modulo
     *
     * Este metodo redirige a la pantalla principal del modulo Representante
     * esta pantalla mostrara un listado de los representantes agregados y un boton para modificar
     * y eliminar
     *
     * @param void
     *
     * @return $representante devuelve objeto de tipo representante
     */
    public function index()
    {
        $representante = Representante::all();
        return view('representante.index')->with('representante',$representante);
    }

    /**
     * Metodo diseñado para direccionar a la pantalla de agregar un Representante
     *
     * Este metodo redirige a la pantalla agregar Representante
     * la cual mostrara un formulario con los campos necesarios para almacenar
     * en la base de datos
     *
     * @param void
     *
     * @return $representante devuelve objeto de tipo representante
     */
    public function create()
    {
        return view('representante.crear');
    }

    public function store()
    {
        $representante = new Representante();
        $representante->cedula=\Request::Input('cedula');
        $representante->nombre=\Request::Input('nombre');
        $representante->apellido=\Request::Input('apellido');
        $representante->email=\Request::Input('email');
        $representante->telefono=\Request::Input('telefono');
        $representante->save();
        return redirect('representante')->with('message','Se ha agregado el representante con exito');
    }

    public function edit($id)
    {
        $representante = Representante::find($id);
        return view('representante.editar')->with('representante', $representante);
    }

    public function update($id)
    {
        $representante = Representante::find($id);
        $representante->cedula=\Request::Input('cedula');
        $representante->nombre=\Request::Input('nombre');
        $representante->apellido=\Request::Input('apellido');
        $representante->email=\Request::Input('email');
        $representante->telefono=\Request::Input('telefono');
        $representante->save();
        return redirect('representante')->with('message','El representante N°'.$id.' ha sido editado');
    }

    public function destroy($id)
    {
        $representante = Representante::find($id);
        $representante->delete();
        return redirect('representante')->with('message','El representante '.$id.' ha sido eliminado');
    }

}
