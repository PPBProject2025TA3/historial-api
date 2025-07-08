<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HistorialController extends Controller
{
    private function validarDatos(array $data)
    {
        $validator = Validator::make($data, [
            'tarea_id' => 'required|integer|exists:tareas,id',
            'titulo' => 'required|string|max:100',
            'usuario_creador_id' => 'required|integer|exists:users,id',
            'estado_actual' => 'required|string|max:50',
            'completitud' => 'nullable|integer|min:0|max:100',
            'fecha_inicio' => 'nullable|date_format:Y-m-d H:i:s',
            'fecha_vencimiento' => 'nullable|date_format:Y-m-d H:i:s|after_or_equal:fecha_inicio',
            'accion' => 'required|string|max:50'
        ]);

        return $validator;
    }

    public function crear(Request $request)
    {
        $validator = $this->validarDatos($request->all());
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $historial = Historial::create([
            'tarea_id' => $request->tarea_id,
            'titulo' => $request->titulo,
            'estado_actual' => $request->estado_actual,
            'usuario_creador_id' => $request->usuario_creador_id,
            'completitud' => $request->completitud,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_vencimiento' => $request->fecha_vencimiento,
            'accion' => $request->accion,
            'fecha_hora' => now()
        ]);

        return response()->json($historial, 201);
    }

    public function listarTodos()
    {
        return response()->json(Historial::all());
    }

    public function obtener($id)
    {
        return response()->json(Historial::findOrFail($id));
    }

    public function porTarea($tareaId)
    {
        return response()->json(
            Historial::where('tarea_id', $tareaId)->get()
        );
    }
}