<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ensayo extends Model
{
    protected $fillable = [
        'nombre', 'abreviatura', 'departamento', 'codigo_validacion','codigo_metodo','incertidumbre','unidad','minimo','maximo'
       ];
}
