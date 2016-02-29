<?php

namespace SISAUGES;

use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{
    public $timestamps = false;
    protected $table = "representante";
    protected $primaryKey = "id_representante";
    protected $fillable = ['cedula','nombre','apellido','email','telefono'];
    protected $guarded = ['id_representante','id_persona'];

    public function institucion()
    {
        return $this->belongsToMany(Institucion::class,
                                    'institucion_departamento_actividad',
                                    'id_institucion',
                                    'id_representante')->withPivot('id_representante','id_departamento');
    }

    public function departamento()
    {
        return $this->belongsToMany(Departamento::class,
                                    'institucion_departamento_actividad',
                                    'id_departamento',
                                    'id_representante')->withPivot('id_institucion','id_representante');
    }
}
