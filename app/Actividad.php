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

    public function representante()
    {
        return $this->belongsToMany(Representante::class,'representante_actividad','id_representante','id_actividad');
    }

    public function tesista()
    {
       return $this->belongsTo(Tesista::class,'id_tesista','id_atividad');
    }

    public function muestra()
    {
        return $this->belongsToMany(Muestra::class,'muestra_actividad','id_muestra','id_actividad');
    }

    public function sectorActividad()
    {
        return $this->hasMany(SectorActividad::class,'id_sector_ac','id_actividad');
    }
}
