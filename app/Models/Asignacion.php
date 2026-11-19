<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    protected $fillable = [
        'bien_id',
        'usuario_id',
        'fecha_entrega',
        'observacion',
    ];

    public function bien()
    {
        return $this->belongsTo(Bien::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
