<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Primero verifica si la tabla existe y elimínala para recrearla completa
        Schema::dropIfExists('solicitudes');
        
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('rut');
            $table->date('fecha_nacimiento');
            $table->string('telefono');
            $table->string('email');
            $table->decimal('altura', 5, 2);
            $table->decimal('peso', 5, 2);
            $table->enum('rodilla', ['izquierda', 'derecha', 'ambas']);
            $table->enum('subir_escaleras', ['si', 'no']);
            $table->enum('bajar_escaleras', ['si', 'no']);
            $table->enum('sentarse', ['si', 'no']);
            $table->string('comuna');
            $table->string('centro_id');
            $table->enum('estado', ['pendiente', 'aprobada', 'rechazada', 'enviada'])->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes');
    }
}
