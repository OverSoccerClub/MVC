<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedBigInteger('especialidade_id'); // Chave estrangeira
            $table->string('crm')->unique();
            $table->timestamps();

            // Definindo a chave estrangeira com relacionamento
            $table->foreign('especialidade_id')->references('id')->on('especialidades');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('medicos');
    }
};