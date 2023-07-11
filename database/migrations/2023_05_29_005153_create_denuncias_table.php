<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('denuncias', function (Blueprint $table) {
            $table->id();
            $table->integer('idlocalidad')->nullable();
            $table->integer('idciudad')->nullable();
            $table->integer('idfirma')->nullable();
            $table->integer('iduser')->nullable();
            $table->string('mensaje')->nullable();
            $table->string('hora')->nullable();
            $table->string('fecha')->nullable();
            $table->string('ubicacion')->nullable(); /*GUARDA LA UBICACION DE GOOGLE MAPS O API A FIN */
            $table->string('tipo')->nullable();
            $table->string('estado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('denuncias');
    }
};
