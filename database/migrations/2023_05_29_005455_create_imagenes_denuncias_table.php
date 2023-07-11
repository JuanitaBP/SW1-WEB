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
        Schema::create('imagenes_denuncias', function (Blueprint $table) {
            $table->id();
            $table->integer('iddenuncia')->nullable();
            $table->integer('iduser')->nullable();
            $table->string('hora')->nullable();
            $table->string('fecha')->nullable();
            $table->string('urlimagen')->nullable();
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
        Schema::dropIfExists('imagenes_denuncias');
    }
};
