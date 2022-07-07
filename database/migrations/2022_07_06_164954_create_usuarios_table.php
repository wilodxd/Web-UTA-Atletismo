<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('rut', 10)->primary();
            $table->string('nombre', 50);
            $table->string('apellido_1', 50);
            $table->string('apellido_2', 50);
            $table->date('fecha_nacimiento');
            $table->date('fecha_ingreso');
            $table->string('carrera', 50);
            $table->string('correo', 50)->unique();
            $table->string('contrasena', 255);
            $table->integer('tipo_usuario')->default(1);

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
        Schema::dropIfExists('usuarios');
    }
};
