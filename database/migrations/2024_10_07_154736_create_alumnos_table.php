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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('ingreso');
            $table->string('ciclo');
            $table->string('plantel');
            $table->string('licenciatura');
            $table->string('idpwc');
            $table->string('nombre');
            $table->string('diploma');
            $table->string('folio');
            $table->date('fecha');
            $table->string('nombreAdministrativo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};
