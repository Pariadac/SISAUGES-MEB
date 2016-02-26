<?php

namespace SISAUGES;

use Illuminate\Database\Eloquent\Model;

class TipoActividad extends Model
{
    public $timestamps = false;
    protected $table = 'tipo_actividad';
    protected $primaryKey = 'id_tipo_actividad';

    public function Actividad()
    {
        return $this->belongsTo(Actividad::class,'id_actividad','id_tipo_actvidad');
    }

    public function clasificacionActividad()
    {
        return $this->hasMany(ClasificacionActividad::class,'id_clasificacion_actividad','id_actividad');
    }
}
