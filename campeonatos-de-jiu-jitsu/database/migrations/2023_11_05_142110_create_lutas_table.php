<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lutas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('campeonato_id');
            $table->unsignedBigInteger('atleta1_id');
            $table->unsignedBigInteger('atleta2_id');
            $table->string('fase');
            $table->timestamps();

            $table->foreign('campeonato_id')->references('id')->on('campeonatos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lutas');
    }
};
