<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    protected $fillable = ['codigo', 'descripcion', 'estado', 'categoria_id', 'ubicacion_id'];
}
