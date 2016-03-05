<?php

namespace SISAUGES;

use Illuminate\Database\Eloquent\Model;

class NivelUsuario extends Model
{
    public $timestamps=false;
    protected $table='nivel_de_usuario';
    protected $primaryKey='id_nivel_de_usuario';

    public function usuarios()
    {
        return $this->belongsToMany(User::class,'usuarios_niveles','id_usuario','id_nivel_de_usuario');
    }

}
