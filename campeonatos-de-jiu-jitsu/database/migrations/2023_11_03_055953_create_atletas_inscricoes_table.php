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
        Schema::create('atletas_inscricoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campeonato_id');
            $table->foreign('campeonato_id')->references('id')->on('campeonatos')->onDelete('cascade');
            $table->unsignedBigInteger('atleta_id');
            $table->foreign('atleta_id')->references('id')->on('atletas')->onDelete('cascade');
            $table->string('codigo')->unique();
            $table->string('nome');
            $table->date('data_nascimento');
            $table->string('cpf');
            $table->enum('sexo', ['Masculino', 'Feminino']);
            $table->string('email');
            $table->string('senha');
            $table->string('equipe');
            $table->enum('faixa', ['Marrom', 'Preta']);
            $table->enum('peso', ['Leve', 'Pesado']);
            $table->date('data_inscricao');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atletas_inscricoes');
    }
};
