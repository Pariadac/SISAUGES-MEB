<?php

namespace SISAUGES;

use Illuminate\Database\Eloquent\Model;

class Muestra extends Model
{
    public $timestamps=false;
    protected $table="muestra";
    protected $primaryKey="id_muestra";
   	protected $fillable =['codigo_muestra','nombre_original_muestra','ruta_img_muestra','tipo_muestra','descripcion_muestra','fecha_recepcion','fecha_analisis'];

    
}
