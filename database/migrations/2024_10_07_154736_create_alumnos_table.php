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
            $table->string('ingreso')->nullable();
            $table->string('ciclo')->nullable();
            $table->string('plantel')->nullable();
            $table->string('licenciatura')->nullable();
            $table->string('idpwc')->nullable();
            $table->string('nombre');
            $table->string('diploma');
            $table->string('folio');
            $table->date('fecha');
            $table->string('nombreAdministrativo')->nullable();
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
