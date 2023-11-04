<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campeonato_id');
            $table->string('campeonato_codigo');
            $table->enum('sexo', ['Masculino', 'Feminino']);
            $table->enum('faixa', ['Marrom', 'Preta']);
            $table->enum('peso', ['Leve', 'Pesado']);
            $table->string('equipe');
            $table->string('primeiro_colocado');
            $table->string('segundo_colocado');
            $table->string('terceiro_colocado');
            $table->timestamps();

            $table->foreign('campeonato_id')->references('id')->on('campeonatos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('resultados');
    }
};
