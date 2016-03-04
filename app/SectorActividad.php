<?php

namespace SISAUGES;

use Illuminate\Database\Eloquent\Model;

class SectorActividad extends Model
{
    public $timestamps = false;
    protected $table = 'sector_actividad';
    protected $primaryKey = 'id_sector_ac';
    protected $fillable = ['descripcion_sector'];
    protected $guarded = ['id_sector_ac'];

    public function actividades()
    {
        return $this->hasMany(Actividad::class,'id_sector_ac');
    }
}
