<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table = 'historial';
    protected $fillable = [
        'tarea_id',
        'titulo',
        'estado_actual',
        'usuario_creador_id',
        'fecha_hora',
        'accion',
        'completitud',
        'fecha_inicio',
        'fecha_vencimiento'
    ];

    
    protected $casts = [
        'tarea_id' => 'integer', 
        'usuario_creador_id' => 'integer',
        'fecha_hora' => 'datetime'
    ];
}