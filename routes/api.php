<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistorialController;

Route::prefix('historial')->group(function () {
    Route::get('/', [HistorialController::class, 'index']);
    Route::post('/', [HistorialController::class, 'store']);
    Route::get('/{id}', [HistorialController::class, 'show']);
    Route::get('/tarea/{taskId}', [HistorialController::class, 'forTask']);
});