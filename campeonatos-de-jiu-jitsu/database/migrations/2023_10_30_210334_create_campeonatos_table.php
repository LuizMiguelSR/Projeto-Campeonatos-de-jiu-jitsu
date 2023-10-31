<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('campeonatos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->unique();
            $table->string('titulo')->required();
            $table->string('imagem')->required();
            $table->string('cidade_estado')->required();
            $table->date('data_realizacao')->required();
            $table->text('sobre_evento')->required();
            $table->text('ginasio')->required();
            $table->text('informacoes_gerais')->required();
            $table->text('entrada_publico')->nullable();
            $table->enum('tipo', ['Kimono', 'No-Gi'])->required();
            $table->enum('fase', ['incricao', 'chaveamento', 'resultado'])->required();
            $table->enum('status', ['Ativo', 'Inativo'])->required();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('campeonatos');
    }
};
