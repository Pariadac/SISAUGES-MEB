<?php

namespace SISAUGES;

use Illuminate\Database\Eloquent\Model;

class Tesista extends Model
{
    public $timestamps=false;
    protected $table="tesista";
    protected $primaryKey="id_tesista";

    public function actividad()
    {
        return $this->hasMany(Actividad::class,'id_actividad','id_tesista');
    }
}
