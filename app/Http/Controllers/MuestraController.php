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


class MuestraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }





    public function index()
    {

    	$datos=DB::table('muestra')->orderBy('id_muestra','desc')->get();


    	if ($datos) {
            $public_path = public_path();

            $url = $public_path.'/storage/'.$datos[0]->ruta_img_muestra;

            //verificamos si el archivo existe y lo retornamos

            if (Storage::exists($datos[0]->ruta_img_muestra))
            {

                $datos['ruta_img_muestra']=$url;  
            }
        }


        return view('muestra.index',compact('datos'));
    }





    public function create()
    {

        return view('muestra.crear');
    }


    public function ajaxvalidar(){


    	$data=Input::all();

        if (strlen($data['rutamuestra'])>0) {
            
            $valores=explode('/', $data['rutamuestra']);

            Storage::delete($valores[count($valores)-1]);

        }


        $file=$data['filebutton'];

        $ruta=$_SERVER['DOCUMENT_ROOT']."/storage/";

        $image = new Imagick($data['filebutton']->getRealPath());

        $fecha=date("d_m_Y_H_i_s");

        $ruta=$ruta.'aux-'.$fecha.".jpg";

        $image->setImageFormat('jpg');

        $image->writeImage($ruta);

    	$error=0;

    	if ($file->getSize()>1000000)
		{$msg="El archivo es mayor que 200KB";
		$error=1;
		}else
		{$msg="archivo guardado";}

 
       return response()->json([
       		'msn'=>$msg,
       		'errorm'=>$error,
            'ruta'=>'/storage/'.'aux-'.$fecha.".jpg"
       	]);


    }


    public function store()
    {
     
    	$retorno=0;

    	$data=Input::all();

        if (strlen($data['rutamuestra'])>0) {
            
            $valores=explode('/', $data['rutamuestra']);

            Storage::delete($valores[count($valores)-1]);

        }

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

	    	$muestra->tipo_muestra=$data['tip_mues'];
	    	$muestra->descripcion_muestra=$data['textarea'];
	    	$muestra->fecha_recepcion=$data['fecha_recepcion'];
	    	$muestra->fecha_analisis=$data['fecha_analisis'];


	    	if ($muestra->save()) {

		    	//obtenemos el campo file definido en el formulario
		    	$file = $data['filebutton'];
		 
		    	//indicamos que queremos guardar un nuevo archivo en el disco local
		    	\Storage::disk('local')->put($nombre,  \File::get($file));

	    	}

    	}else{
    		$retorno=1;
    	}


    	return view('muestra.crear',compact('retorno'));


    }


    public function listar(){
    	$datos=Muestra::all();
    	return view('muestra.lista',compact('datos'));
    }

    public function edit($id)
    {
        
    }

    public function update($id)
    {
        
    }

    public function destroy($id)
    {
        
    }
}




?>