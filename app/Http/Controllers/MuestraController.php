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
use Illuminate\Pagination\LengthAwarePaginator;


class MuestraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Funciones para obtener las relaciones de una muestra a partir de esta

    public function obtener_actividad($valor){

    	$act=DB::table('muestra_actividad')->where('id_muestra','=',$valor)->get();

    	$aux=array();

        foreach ($act as $key2) {
        	$aux1=DB::table('actividad')->where('id_actividad','=',$key2->id_actividad)->get();
        	$aux=array_merge($aux,$aux1);
        }

        return $aux;

    }

    public function obtener_institucion($valor){

    	$inst=DB::table('muestra_actividad')->where('id_muestra','=',$valor)->get();
    	$aux=array();

        foreach ($inst as $llave1) {
        
        	$rep=DB::table('representante_actividad')->where('id_actividad','=',$llave1->id_actividad)->get();

        	foreach ($rep as $llave2) {

        		$act=DB::table('institucion_departamento_representante')->where('id_representante',$llave2->id_representante)->get();

        		foreach ($act as $llave3) {
        			
        			$aux1=DB::table('institucion')->where('id_institucion','=',$llave3->id_institucion)->get();

        			$aux=array_merge($aux,$aux1);

        		}
        	}

        }

        return $aux; 

    }

    public function obtener_tecnica($valor){

    	$act=DB::table('muestra_tecnica_estudio')->where('id_muestra','=',$valor)->get();

    	$aux=array();

        foreach ($act as $key2) {
        	$aux1=DB::table('tecnica_estudio')->where('id_tecnica_estudio','=',$key2->id_tecnica_estudio)->get();
        	$aux=array_merge($aux,$aux1);
        }

        return $aux;

    }




    //Funcion para generar una imagen compatible con el navegador

    public function generar_imagen_visible($original_paht,$id){


        $ruta=$_SERVER['DOCUMENT_ROOT']."/storage/";

        $image = new Imagick($original_paht);

        $fecha=date("d_m_Y_H_i_s");

        $ruta=$ruta.$id.'aux-'.$fecha.".jpg";

        $image->setImageFormat('jpg');

        $image->writeImage($ruta);

        return $id.'aux-'.$fecha.'.jpg';

    }

    //Retorno a la pagina principal de Muestras

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


    //Funcion que retorna a la pagina de agregar muestra

    public function create()
    {
        $actividad=Actividad::all();
        $tecnica=TecnicaEstudio::all();

        return view('muestra.crear',compact('actividad','tecnica'));
    }

    //Funcion que retorna una imagen visible a la vista de agregar muestra

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

    //Funcion que elimina las imagenes auxiliares compatibles con el navegador

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

    //Funcion que almacena la informacion en la base de datos, y la imagen en el servidor


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



    //Funcion que retorna a la Vista listar de Muestras


    public function listar(){

    	$retorno=array();

    	$valores=array();

    	$datos=Muestra::all();

        $public_path = public_path();

        foreach ($datos as $key => $value) {


            if (Storage::exists($value->ruta_img_muestra))
            {

                $datos[$key]->ruta_img_muestra=$this->generar_imagen_visible($public_path.'/storage/'.$value->ruta_img_muestra,$key);
            }

            $valores['muestra-d']=$datos[$key];
            $valores['actividad-d']=$this->obtener_actividad($value->id_muestra);
            $valores['institucion-d']=$this->obtener_institucion($value->id_muestra);
            $valores['tecnica-d']=$this->obtener_tecnica($value->id_muestra);

            $retorno[]=$valores;
            

        }

        $tecnica=TecnicaEstudio::all();


    	return view('muestra.lista',compact('datos','tecnica','retorno'));
    }


    //Funcion que busca las relaciones de muestra usando el nombre principal de dichas relaciones como parametro

    public function resultadosbdd($valor,$posi){

        $tablas=array('actividad','tecnica_estudio','institucion');
        $campo2=array('nombre_actividad','descripcion_tecnica_estudio','nombre_institucion');

        $resultados=DB::table($tablas[$posi])->where($campo2[$posi],'ILIKE','%'.$valor.'%')->get();

        return $resultados;

    }


    //Funcion ajax utilizada para retornar una lista de las relaciones de muestra

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


    function retornar_busqueda_filtro($valores){

    	$retorno=array();


    }



    //Funcion que retorna la busqueda de muestras segun el filtro utilizado por el usuario

    public function buscar_filtros(Request $request){
       
        $aux=array();
        $retorno=array();
        $coincidencias=0;

        $query=['actividades_mues_bus'=>$request->actividades_mues_bus,
        		'institucion_mues_bus'=>$request->institucion_mues_bus,
        		'tecnica_mues_bus'=>$request->tecnica_mues_bus,
        		'inicio_mues_bus'=>$request->inicio_mues_bus,
        		'fin_mues_bus'=>$request->fin_mues_bus

        		];


        if ($request->actividades_mues_bus!='') {

            $valor=$request->actividades_mues_bus;         
            
            $act=DB::table('muestra_actividad')->where('id_actividad','=',$valor)->get();

            foreach ($act as $key2) {
            	$aux1=DB::table('muestra')->where('id_muestra','=',$key2->id_muestra)->get();
            	$aux=array_merge($aux,$aux1);
            }

            $coincidencias++;


        }

        if ($request->institucion_mues_bus!='') {

            $valor=$request->institucion_mues_bus;

            $inst=DB::table('institucion_departamento_representante')->where('id_institucion','=',$valor)->get();

            foreach ($inst as $llave1) {
            
            	$rep=DB::table('representante_actividad')->where('id_representante','=',$llave1->id_representante)->get();

            	foreach ($rep as $llave2) {

            		$act=DB::table('muestra_actividad')->where('id_actividad','=',$llave2->id_actividad)->get();

            		foreach ($act as $llave3) {
            			
            			$aux1=DB::table('muestra')->where('id_muestra','=',$llave3->id_muestra)->get();

            			$aux=array_merge($aux,$aux1);

            		}
            	}

            }    
            
            $coincidencias++;


        }
        if ($request->tecnica_mues_bus!='') {

            $valor=$request->tecnica_mues_bus;
                

            $tect=DB::table('muestra_tecnica_estudio')->where('id_tecnica_estudio','=',$valor)->get();


            foreach ($tect as $key2) {
            	$aux1=DB::table('muestra')->where('id_muestra','=',$key2->id_muestra)->get();
            	$aux=array_merge($aux,$aux1);
            }

            $coincidencias++;


        }
        if ($request->inicio_mues_bus!=''&&$request->fin_mues_bus!='') {

            $aux1=DB::table('muestra')->whereBetween('fecha_analisis',[$request->inicio_mues_bus,$request->fin_mues_bus])->get();
            $aux=array_merge($aux,$aux1); 
            $coincidencias++;           

        }

        while (count($aux)!=0) {

        	$aux=array_values($aux);
        	$tama=count($aux);
        	$compaux=$aux[0];
        	unset($aux[0]);
        	$aux=array_values($aux);
        	$validador=1;

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

        $page = Input::get('page', 1); 

        $perPage = 2;

        $offSet = ($page * $perPage) - $perPage;

        $itemsForCurrentPage = array_slice($retorno, $offSet, $perPage, true);


        $valores=array();

        $retorno=array();

    	$datos=$itemsForCurrentPage;

        $public_path = public_path();

        foreach ($datos as $key => $value) {


            if (Storage::exists($value->ruta_img_muestra))
            {

                $datos[$key]->ruta_img_muestra=$this->generar_imagen_visible($public_path.'/storage/'.$value->ruta_img_muestra,$key);
            }

            $valores['muestra-d']=$datos[$key];
            $valores['actividad-d']=$this->obtener_actividad($value->id_muestra);
            $valores['institucion-d']=$this->obtener_institucion($value->id_muestra);
            $valores['tecnica-d']=$this->obtener_tecnica($value->id_muestra);
            
            $retorno[]=$valores;

        }

        $itemsForCurrentPage=$retorno;


        $tecnica=TecnicaEstudio::all();


        $paginador=new LengthAwarePaginator($itemsForCurrentPage, count($retorno), $perPage, $page, ['path' => 'buscarfiltro','query' =>$query]);

        return view('muestra.prueba',compact('paginador','tecnica','itemsForCurrentPage')); 


    }




    //Funcion que retorna la vista para editar una muestra

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


    //Funcion que actualiza los datos de una muestra

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

    //Funcion que muestra los detalles de una muestra incluyendo las muestras relacionadas

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


    //Funcion que busca las relaciones de una actividad para una muestra

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


    //Funcion de Eliminar muestra

    public function destroy($id)
    {
        
    }
}




?>