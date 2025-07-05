<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Historial::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);
        
        $historial = Historial::create($validated + [
            'fecha_hora' => now()
        ]);

        return response()->json($historial, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(Historial::findOrFail($id));
    }

    /**
     * Get logs for a specific task
     */
    public function forTask(string $taskId)
    {
        return response()->json(
            Historial::where('tarea_id', $taskId)->get()
        );
    }

    /**
     * Validate the request data
     */
    protected function validateRequest(Request $request): array
    {
        return $request->validate([
            'tarea_id' => 'required|integer|exists:tareas,id',
            'titulo' => 'required|string|max:100',
            'estado_actual' => 'required|string|max:50',
            'usuario_creador_id' => 'required|integer|exists:users,id',
            'accion' => 'required|string|max:50'
        ]);
    }
}