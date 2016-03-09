<?php namespace SISAUGES\Http\Controllers;

use Illuminate\Http\Request;
use Collective\Html\HtmlServiceProvider;
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
use SISAUGES\Representante;


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
	    		$nombre=$muestra->ruta_img_muestra='imagen-0-'.$fecha.".".$file->getClientOriginalExtension();
                $valor=0;
	    	}


	    	$muestra->codigo_muestra=$data['textinput'];
	    	$muestra->nombre_original_muestra=$file->getClientOriginalName();
	    	$muestra->descripcion_muestra=$data['textarea'];
	    	$muestra->fecha_recepcion=$data['fecha_recepcion'];
	    	$muestra->fecha_analisis=$data['fecha_analisis'];


	    	if ($muestra->save()) {

                DB::table('muestra_actividad')->insert(['id_actividad'=>$data['tipo_actividad_fin'],'id_muestra'=>$muestra->id_muestra]);

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

        $tecnica=TecnicaEstudio::all();

    	return view('muestra.lista',compact('datos','tecnica'));
    }


    public function resultadosbdd($valor,$posi){

        $tablas=array('actividad','tecnica_estudio','institucion');
        $campo2=array('nombre_actividad','descripcion_tecnica_estudio','nombre_institucion');

        $resultados=DB::table($tablas[$posi])->where($campo2[$posi],'ILIKE','%'.$valor.'%')->get();

        return $resultados;

    }







    public function buscarbdd(){

        $datos=Input::all();

        $campo1=array('id_actividad','id_tecnica_estudio','id_institucion');
        $campo2=array('nombre_actividad','descripcion_tecnica_estudio','nombre_institucion');

        $resultados=$this->resultadosbdd($datos['valor'],$datos['bus']-1);

        $datosdb="";

        if ($resultados) {
            foreach ($resultados as $key) {
                $datosdb.='<li data-ids="'.$datos['bus'].'" data-value="'.$key->$campo1[$datos['bus']-1].'" data-valortx="'.$key->$campo2[$datos['bus']-1].'" > <p class="miminibuscador" >'.$key->$campo2[$datos['bus']-1].'</p> </li>';
            }
        }else{
            $datosdb='<li><span>No se Encuentra ningun resultado</span></li>';
        }

        
        $var=array('resultado'=>$datosdb);

        return response()->json($var);
    }


    public function buscar_filtros(){
       
        $datos=Input::all();
        $aux=array();
        $retorno=array();
        $coincidencias=0;
        $validador=1;
        $relaciones=array();


        var_dump($datos);

        if ($datos['actividades_mues_bus']!='') {

        	$relaciones['act']=$datos['actividades_mues_bus_f'];

            $valor=$datos['actividades_mues_bus'];
            
                

            $aux1=DB::table('actividad')->join('muestra_actividad',function($join) use($valor){


                $join->where('muestra_actividad.id_actividad','=',$valor);


            })->join('muestra','muestra.id_muestra','=','muestra_actividad.id_muestra')->get();

            $aux=array_merge($aux,$aux1);
            $coincidencias++;


        }

        if ($datos['institucion_mues_bus']!='') {

        	$relaciones['inst']=$datos['institucion_mues_bus_f'];

            $valor=$datos['institucion_mues_bus'];
                

            $aux1=DB::table('institucion')->join('institucion_departamento_representante',function($join) use($valor){


                $join->where('institucion_departamento_representante.id_institucion','=',$valor);


            })->join('representante_actividad','representante_actividad.id_representante','=','institucion_departamento_representante.id_representante')
            ->join('actividad','actividad.id_actividad','=','representante_actividad.id_actividad')
            ->join('muestra_actividad','muestra_actividad.id_actividad','=','actividad.id_actividad')
            ->join('muestra','muestra.id_muestra','=','muestra_actividad.id_muestra')->select('muestra.*')->get();

            $aux=array_merge($aux,$aux1);
            $coincidencias++;


        }
        if ($datos['tecnica_mues_bus']!='') {

            $valor=$datos['tecnica_mues_bus'];
            $relaciones['tect']=TecnicaEstudio::find($valor);
                

            $tect=DB::table('muestra_tecnica_estudio')->where('id_tecnica_estudio','=',$valor)->get();


            foreach ($tect as $key2) {
            	$aux1=DB::table('muestra')->where('id_muestra','=',$key2->id_muestra)->get();
            	$aux=array_merge($aux,$aux1);
            }

            $coincidencias++;


        }
        if ($datos['inicio_mues_bus']!=''&&$datos['fin_mues_bus']!='') {

            $aux1=DB::table('muestra')->whereBetween('fecha_analisis',[$datos['inicio_mues_bus'],$datos['fin_mues_bus']])->get();
            $aux=array_merge($aux,$aux1); 
            $coincidencias++;           

        }



        while (count($aux)!=0) {

        	$aux=array_values($aux);
        	$tama=count($aux);
        	$compaux=$aux[0];
        	unset($aux[0]);
        	$aux=array_values($aux);

        	for ($i=0; $i <$tama-1 ; $i++) { 
        		
        		if ($compaux->id_muestra==$aux[$i]->id_muestra) {
        			
        			$validador++;
        			unset($aux[$i]);

        		}

        	}
        	
        	if ($validador==$coincidencias) {
        		$retorno[]=$compaux;
        	}


        }

        var_dump($retorno);
        var_dump($relaciones);
        	

    }







    public function edit($id)
    {
     
        $muestra=Muestra::find($id);

        $tecnica_estudio_mues=DB::table('muestra_tecnica_estudio')->where('id_muestra','=',$muestra->id_muestra)->get();

        $muestracontenido=null;

        if (Storage::exists($muestra->ruta_img_muestra))
        {
            $muestracontenido=Storage::size($muestra->ruta_img_muestra);
            $muestra->ruta_img_muestra=$this->generar_imagen_visible(public_path().'/storage/'.$muestra->ruta_img_muestra,$muestra->id_muestra);


            if ($muestracontenido<1000000) {
                $muestracontenido=$muestracontenido / 1000;
                $ext='KB';
            }else{
                $muestracontenido=$muestracontenido / 1000000;
                $ext='MB';
            }

            $muestracontenido=number_format($muestracontenido, 2,'.','').$ext;
        }


        $actividad=Actividad::all();
        $tecnica=TecnicaEstudio::all();

        return view('muestra.crear',compact('muestra','actividad','tecnica','muestracontenido','tecnica_estudio_mues'));

    }

    public function update($id)
    {

        $data=Input::all(); 

        $muestra=Muestra::find($id);

        $fecha=date("d_m_Y_H_i_s");


        $muestra->codigo_muestra=$data['textinput'];
        $muestra->descripcion_muestra=$data['textarea'];
        $muestra->fecha_recepcion=$data['fecha_recepcion'];
        $muestra->fecha_analisis=$data['fecha_analisis'];

        if (isset($data['filebutton'])) {

           if (Storage::exists($muestra->ruta_img_muestra))
            {

                Storage::delete($muestra->ruta_img_muestra);

            }

            $muestra->nombre_original_muestra=$data['filebutton']->getClientOriginalName();

            

            $file = $data['filebutton'];

            $muestra->ruta_img_muestra='imagen-'.$muestra->id_muestra."-".$fecha.".".$file->getClientOriginalExtension();

            \Storage::disk('local')->put($muestra->ruta_img_muestra,  \File::get($file));



        }


        if ($muestra->save()) {
            $retorno=0;
        }else{
            $retorno=1;
        }

        $actividad=Actividad::all();
        $tecnica=TecnicaEstudio::all();

        return view('muestra.crear',compact('retorno','actividad','tecnica'));

        
    }

    public function details($id){


        $muestra=Muestra::find($id);

        $tecnica_estudio_mues=DB::table('muestra_tecnica_estudio')->where('id_muestra','=',$muestra->id_muestra)->get();

        $muestracontenido=null;

        if (Storage::exists($muestra->ruta_img_muestra))
        {
            $muestracontenido=Storage::size($muestra->ruta_img_muestra);
            $muestra->ruta_img_muestra=$this->generar_imagen_visible(public_path().'/storage/'.$muestra->ruta_img_muestra,$muestra->id_muestra);


            if ($muestracontenido<1000000) {
                $muestracontenido=$muestracontenido / 1000;
                $ext='KB';
            }else{
                $muestracontenido=$muestracontenido / 1000000;
                $ext='MB';
            }

            $muestracontenido=number_format($muestracontenido, 2,'.','').$ext;
        }


        $actividad=Actividad::all();
        $tecnica=TecnicaEstudio::all();

        return view('muestra.detail',compact('muestra','actividad','tecnica','muestracontenido','tecnica_estudio_mues'));

    }


    public function relacionesact(){

        $datos=Input::all();

        $act=Actividad::find($datos['bus']);
        $represent=DB::table('actividad')->join('representante_actividad',function($join){

            $datos=Input::all();

            $join->where('representante_actividad.id_actividad','=',$datos['bus']);


        })->join('representante','representante.id_representante','=','representante_actividad.id_representante')
        ->select('representante.*')->get();
        $sector=DB::table('sector_actividad')->where('id_sector_ac','=',$act->id_sector_ac)->get();


        return response()->json([
            'act'=>$act->status_actividad,
            'cirepre'=>$represent[0]->cedula,
            'nomrepre'=>$represent[0]->nombre." ".$represent[0]->apellido,
            'sect'=>$sector[0]->descripcion_sector
        ]);

    }


    public function destroy($id)
    {
        
    }
}




?>