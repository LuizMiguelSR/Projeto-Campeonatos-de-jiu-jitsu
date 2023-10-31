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
            $table->string('codigo')->nullable(false);
            $table->string('titulo')->nullable(false);
            $table->string('imagem')->nullable(false);
            $table->string('cidade')->nullable(false);
            $table->enum('estado', ['Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'Distrito Federal', 'Espírito Santo', 'Goiás', 'Maranhão', 'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Pará', 'Paraíba', 'Paraná', 'Pernambuco', 'Piauí', 'Rio de Janeiro', 'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondônia', 'Roraima', 'Santa Catarina', 'São Paulo', 'Sergipe', 'Tocantins'])->nullable(false);
            $table->date('data_realizacao')->nullable(false);
            $table->text('sobre_evento')->nullable(false);
            $table->text('ginasio')->nullable(false);
            $table->text('informacoes_gerais')->nullable(false);
            $table->text('entrada_publico')->nullable();
            $table->enum('tipo', ['Kimono', 'No-Gi'])->nullable(false)->default('Kimono');
            $table->enum('fase', ['Inscrição', 'Chaveamento', 'Resultado'])->nullable(false)->default('Inscrição');
            $table->enum('status', ['Ativo', 'Inativo'])->nullable(false)->default('Ativo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('campeonatos');
    }
};
