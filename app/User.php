<?php

namespace SISAUGES;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = false;
    protected $table="usuario";
    protected $primaryKey = "id_usuario";
    protected $fillable = ['cedula','nombre','apellido','email','telefono','username', 'password'];
    protected $guarded = ['id_usuario'];
    protected $hidden = ['password', 'remember_token'];

    public function muestra()
    {
        return $this->hasMany(Muestra::class,'id_muestra','id_usuario');
    }

    public function nivelUsuarios()
    {
        return $this->belongsToMany(NivelUsuario::class,'usuarios_niveles','id_usuario','id_nivel_de_usuario');
    }


}
