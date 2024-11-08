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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->date('data_consulta');          // Data da consulta
            $table->time('hora_consulta');          // Hora da consulta
            $table->enum('status', ['Agendado', 'Cancelado', 'Concluído']); // Status da consulta
            $table->foreignId('medico_id')->constrained('medicos'); // Médico (chave estrangeira)
            $table->foreignId('paciente_id')->constrained('pacientes'); // Paciente (chave estrangeira)
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
        Schema::dropIfExists('consultas');
    }
};
