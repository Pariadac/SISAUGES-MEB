<?php

namespace SISAUGES\Http\Controllers;

use Illuminate\Http\Request;

use SISAUGES\Http\Requests;
use SISAUGES\Http\Controllers\Controller;
use SISAUGES\Departamento;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class DepartamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $mostrar = Departamento::all();

        return view('departamento.principal',compact('mostrar'));

    }

    public function create()
    {

        return view('departamento.formulario');

    }

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

    public function edit($id)
    {
        $departamento=Departamento::find($id);
        return view('departamento.editar')->with('departamento',$departamento);

    }

    public function update($id)
    {

        $departamento=Departamento::find($id);

        $id->descripcion_departamento=\Request::Input('nomb');

        $departamento->save();


        $retorno=0;

        return view('departamento.formulario',compact('retorno'));

    }

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
