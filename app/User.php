<?php

namespace SISAUGES;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * Atributo que asigna el nombre de la tabla
     *
     * @var string
     */

    public $timestamps = false;
    protected $table="usuario";
    protected $primaryKey = "id_usuario";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cedula','nombre', 'apellido','email','telefono','username', 'password'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
    */
    protected $hidden = [
        'password', 'remember_token'
    ];


}
