<?php

namespace SISAUGES;

use Illuminate\Database\Eloquent\Model;

class SectorActividad extends Model
{
    public $timestamps = false;
    protected $table = 'sector_actividad';
    protected $primaryKey = 'id_sector_ac';

    public function clasificacionActividad()
    {
        return $this->belongsTo(ClasificacionActividad::class,'id_clasificacion_actividad','id_sector_ac');
    }
}
