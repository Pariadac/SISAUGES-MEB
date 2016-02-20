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
        $this->belongsToMany(ClasificacionActividad::class);
    }
}
