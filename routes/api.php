<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistorialController;

Route::get('/', [HistorialController::class, 'listarTodos']);
Route::post('/', [HistorialController::class, 'crear']);
Route::get('/{id}', [HistorialController::class, 'obtener'])->where('id', '[0-9]+');
Route::get('/tarea/{tareaId}', [HistorialController::class, 'porTarea'])->where('tareaId', '[0-9]+');
