<?php

namespace SISAUGES;

use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{
    public $timestamps = false;
    protected $table = "representante";
    protected $primaryKey = "id_representante";
}
