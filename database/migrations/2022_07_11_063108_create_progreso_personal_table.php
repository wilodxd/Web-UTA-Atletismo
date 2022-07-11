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
        Schema::create('progresopersonal', function (Blueprint $table) {
            $table->id();
            $table->string('rut_usuario', 12)->foreign('rut_usuario')->references('rut')->on('usuarios');
            $table->integer('tiempo')->default(0);
            $table->integer('distancia')->default(0);
            $table->longText('comentarios')->nullable();
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
        Schema::dropIfExists('_progreso_personal');
    }
};
