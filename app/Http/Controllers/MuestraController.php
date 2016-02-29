<?php namespace SISAUGES\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Html\HtmlServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\Validation\ValidationException;

use Storage;

use Imagick;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use SISAUGES\Http\Controllers\Controller;
use SISAUGES\Muestra;
use SISAUGES\Actividad;
use SISAUGES\TecnicaEstudio;


class MuestraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }




    public function generar_imagen_visible($original_paht,$id){


        $ruta=$_SERVER['DOCUMENT_ROOT']."/storage/";

        $image = new Imagick($original_paht);

        $fecha=date("d_m_Y_H_i_s");

        $ruta=$ruta.$id.'aux-'.$fecha.".jpg";

        $image->setImageFormat('jpg');

        $image->writeImage($ruta);

        return $id.'aux-'.$fecha.'.jpg';

    }


    public function index()
    {

    	$datos=DB::table('muestra')->orderBy('id_muestra','desc')->get();


    	if ($datos) {
            $public_path = public_path();

            $url = $public_path.'/storage/'.$datos[0]->ruta_img_muestra;

            $newimg=$this->generar_imagen_visible($url,1);

            $url = $public_path.'/storage/'.$newimg;

            //verificamos si el archivo existe y lo retornamos

            if (Storage::exists($newimg))
            {

                $datos[0]->ruta_img_muestra=$newimg;  
            }
        }


        return view('muestra.index',compact('datos'));
    }



    public function prueba(){
        $suma=4+5;
    }




    public function create()
    {
        $actividad=Actividad::all();
        $tecnica=TecnicaEstudio::all();

        return view('muestra.crear',compact('actividad','tecnica'));
    }



    public function ajaxvalidar(){


    	$data=Input::all();

        $file=$data['filebutton'];


        $ruta_n=$this->generar_imagen_visible($data['filebutton']->getRealPath(),1);

    	$error=0;

		$msg="archivo guardado";

 
       return response()->json([
       		'msn'=>$msg,
       		'errorm'=>$error,
            'ruta'=>'/storage/'.$ruta_n,
            'orgnl'=>$file->getClientOriginalName(),
            'tama'=>$file->getSize()
       	]);


    }

    public function borrar_img(){

        $data=Input::all();

        $retorno=0;

        var_dump($data['rutamuestra']);

        foreach ($data['rutamuestra'] as $key) {

          if (strlen($key)>0) {
            
                $valores=explode('/', $key);

                if (Storage::exists($valores[count($valores)-1]))
                {

                    $retorno=Storage::delete($valores[count($valores)-1]);

                }

            }  

        }


        return response()->json([
            'msn'=>$retorno
        ]);

    }


    public function store()
    {
     
    	$retorno=0;

    	$data=Input::all();

    	$file = $data['filebutton'];

    	$muestra=new Muestra();


    	$fecha=date("d_m_Y_H_i_s");


    	$valor=DB::table('muestra')->max('id_muestra');



    	$compro=DB::table('muestra')->where('codigo_muestra','=',$data['textinput'])->count();

    	if ($compro==0) {

    		if ($valor) {
    		$nombre=$muestra->ruta_img_muestra='imagen-'.$valor."-".$fecha.".".$file->getClientOriginalExtension();
	    	}else{
	    		$nombre=$muestra->ruta_img_muestra='imagen-1-'.$fecha.".".$file->getClientOriginalExtension();
	    	}


	    	$muestra->codigo_muestra=$data['textinput'];
	    	$muestra->nombre_original_muestra=$file->getClientOriginalName();
	    	$muestra->descripcion_muestra=$data['textarea'];
	    	$muestra->fecha_recepcion=$data['fecha_recepcion'];
	    	$muestra->fecha_analisis=$data['fecha_analisis'];




	    	if ($muestra->save()) {

                $asociacion=DB::table('muestra')->max('id_muestra');

                DB::table('muestra_tecnica_estudio')->insert(['id_tecnica_estudio'=>$data['tipo_muestra'],'id_muestra'=>$asociacion]);


		    	//obtenemos el campo file definido en el formulario
		    	$file = $data['filebutton'];
		 
		    	//indicamos que queremos guardar un nuevo archivo en el disco local
		    	\Storage::disk('local')->put($nombre,  \File::get($file));

	    	}

    	}else{
    		$retorno=1;
    	}


        $actividad=Actividad::all();
        $tecnica=TecnicaEstudio::all();

    	return view('muestra.crear',compact('retorno','actividad','tecnica'));


    }


    public function listar(){
    	$datos=Muestra::all();

        $public_path = public_path();

        foreach ($datos as $key => $value) {


            if (Storage::exists($value->ruta_img_muestra))
            {

                $datos[$key]->ruta_img_muestra=$this->generar_imagen_visible($public_path.'/storage/'.$value->ruta_img_muestra,$key);
            }
            

        }


    	return view('muestra.lista',compact('datos'));
    }

    public function edit($id)
    {
     
        $muestra=Muestra::find($id);

        return view('muestra.crear',compact('muestra'));

    }

    public function update($id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}




?>