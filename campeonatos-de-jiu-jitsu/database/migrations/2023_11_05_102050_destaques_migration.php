<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('destaques', function (Blueprint $table) {
            $table->id();
            $table->string('primeiro')->nullable();
            $table->string('segundo')->nullable();
            $table->string('terceiro')->nullable();
            $table->string('quarto')->nullable();
            $table->string('quinto')->nullable();
            $table->string('sexto')->nullable();
            $table->string('setimo')->nullable();
            $table->string('oitavo')->nullable();
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('destaques');
    }
};
