<?php

namespace SISAUGES;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = false;
    protected $table="usuario";
    protected $primaryKey = "id_usuario";
    protected $fillable = ['cedula','nombre', 'apellido','email','telefono','username', 'password'];
    protected $guarded = ['id_usuario'];
    protected $hidden = ['password', 'remember_token'];

//    public function nivelDeUsuario()
//    {
//        return $this->hasMany(NivelDeUsuario::class,'id_nivel_de_usuario','id_usuario');
//    }

    public function muestra()
    {
        return $this->hasMany(Muestra::class,'id_muestra','id_usuario');
    }


}
