<?php

namespace SISAUGES;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    public $timestamps = false;
    protected $table = "actividad";
    protected $primaryKey = "id_actividad";

    public function tipoActividad()
    {
        return $this->hasMany(TipoActividad::class,'id_tipo_actividad','id_actividad');
    }

    public function tesista()
    {
       return $this->belongsTo(Tesista::class,'id_actividad','id_tesista');
    }
}
