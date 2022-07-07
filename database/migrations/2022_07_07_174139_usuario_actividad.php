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
        //
        Schema::create('usuarioactividad', function (Blueprint $table) {
            
            $table->string('rut_usuario', 10)->foreign('rut_usuario')->references('rut')->on('usuarios');
            $table->integer('id_publicacion')->foreign('id_publicacion')->references('id')->on('publicaciones');
            $table->primary(['rut_usuario', 'id_publicacion']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
