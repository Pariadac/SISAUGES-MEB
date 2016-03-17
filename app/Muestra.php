<?php

namespace SISAUGES;

use Illuminate\Database\Eloquent\Model;

class Muestra extends Model
{
    public $timestamps=false;
    protected $table="muestra";
    protected $primaryKey="id_muestra";
   	protected $fillable = [ 'codigo_muestra',
                            'nombre_original_muestra',
                            'ruta_img_muestra',
                            'tipo_muestra',
                            'descripcion_muestra',
                            'fecha_recepcion',
                            'fecha_analisis'];
    protected $guarded = ['id_muestra','id_usuario'];

    public function usuario()
    {
        return $this->belongsTo(User::class,'id_usuario','id_muestra');
    }

    public function actividad()
    {
        return $this->belongsToMany(Actividad::class,'muestra_actividad','id_muestra','id_actividad');
    }

    public function tecnicaEstudio()
    {
        return $this->belongsToMany(TecnicaEstudio::class,
                                    'muestra_tecnica_estudio',
                                    'id_muestra',
                                    'id_tecnica_estudio');
    }



    
}
