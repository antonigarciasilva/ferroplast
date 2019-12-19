<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $fillable = [
        'apellidos', 'nombres', 'direccion', 'dni', 'telefono', 'correo', 'cargo_id'
    ];
}
