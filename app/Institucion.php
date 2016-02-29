<?php

namespace SISAUGES;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    public $timestamps=false;
    protected $table="institucion";
    protected $primaryKey="id_institucion";
    protected $fillable = ['nombre_institucion','direccion_institucion','telefono_institucion'];
    protected $guarded = ['id_institucion'];

    public function departamento()
    {
        return $this->belongsToMany(Departamento::class,
                                    'institucion_departamento_representante',
                                    'id_departamento',
                                    'id_institucion');
    }

    public function representante()
    {
        return $this->belongsToMany(Representante::class,
                                    'institucion_departamento_representante',
                                    'id_representante',
                                    'id_institucion');
    }
}
?>