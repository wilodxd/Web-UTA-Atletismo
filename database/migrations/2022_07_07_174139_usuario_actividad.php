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
            $table->foreign('rut_usuario')->references('rut')->on('usuarios');
            $table->foreign('id_publicacion')->references('id')->on('publicaciones');
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
