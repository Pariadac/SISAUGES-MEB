<?php

namespace SISAUGES;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    public $timestamps = false;
    protected $table = "actividad";
    protected $primaryKey = "id_actividad";
    protected $fillable = ['nombre_Actividad','status_actividad','permiso_actividad','id_sector_ac'];
    protected $guarded = ['id_actividad'];

    public function representantes()
    {
        return $this->belongsToMany(Representante::class,'representante_actividad','id_actividad','id_representante');
    }

    public function tesistas()
    {
       return $this->hasMany(Tesista::class,'id_actividad');
    }

    public function muestras()
    {
        return $this->belongsToMany(Muestra::class,'muestra_actividad','id_actividad','id_muestra');
    }

    public function sector()
    {
        return $this->belongsTo(SectorActividad::class,'id_sector_ac');
    }
}
