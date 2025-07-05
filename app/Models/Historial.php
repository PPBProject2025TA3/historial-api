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
        'accion'
    ];

    protected $casts = [
        'fecha_hora' => 'datetime'
    ];

    public function tarea()
    {
        return $this->belongsTo(Tarea::class, 'tarea_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_creador_id');
    }
}