<?php

namespace SISAUGES;

use Illuminate\Database\Eloquent\Model;

class Tesista extends Model
{
    public $timestamps=false;
    protected $table="tesista";
    protected $primaryKey="id_tesista";
    protected $fillable=['cedula',
                         'nombre',
                         'apellido',
                         'email',
                         'telefono',
                         'carrera_tesista',
                         'semestre_tesista'];
    protected $guarded=['id_persona','id_tesista','id_actividad'];

    public function actividad()
    {
        return $this->belongsTo(Actividad::class,'id_actividad');
    }
}
