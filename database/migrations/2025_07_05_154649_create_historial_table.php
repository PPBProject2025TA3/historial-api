<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('historial', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tarea_id');
            $table->string('titulo', 100);
            $table->string('estado_actual', 50);
            $table->unsignedBigInteger('usuario_creador_id');
            $table->dateTime('fecha_hora');
            $table->string('accion', 50);
            $table->timestamps();
            
            $table->foreign('tarea_id')->references('id')->on('tareas');
            $table->foreign('usuario_creador_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial');
    }
};
