<?php

namespace SISAUGES;

use Illuminate\Database\Eloquent\Model;

class ClasificacionActividad extends Model
{
    public $timestamps = false;
    protected $table = "clasificacion_actividad";
    protected $primaryKey = "id_clasificacion_actividad";

    public function tipoActividad()
    {
        return $this->belongsTo(TipoActividad::class,'id_tipo_actividad','id_clasificacion_actividad');
    }

    public function sectorActividad()
    {
        return $this->belongsToMany(SectorActividad::class,'sector_clasificacion_actividad',
                                                            'id_clasificacion_actividad',
                                                            'id_sector_ac')->withPivot('id_sa_ca');
    }
}

