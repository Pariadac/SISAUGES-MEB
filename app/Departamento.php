<?php

namespace SISAUGES;

use Illuminate\Database\Eloquent\Model;
use SISAUGES\Http\Controllers\InstitucionController;

class Departamento extends Model
{
    public $timestamps = false;
    protected  $table = "departamento";
    protected  $primaryKey = "id_departamento";
    protected $fillable = ['descripcion_departamento'];
    protected $guarded = ['id_departamento'];

    public function institucion()
    {
        return $this->belongsToMany(Institucion::class,
                                    'institucion_departamento_representante',
                                    'id_institucion',
                                    'id_departamento');
    }

    public function representante()
    {
        return $this->belongsToMany(Representante::class,
                                    'institucion_departamento_representante',
                                    'id_representante',
                                    'id_departamento');
    }
}
