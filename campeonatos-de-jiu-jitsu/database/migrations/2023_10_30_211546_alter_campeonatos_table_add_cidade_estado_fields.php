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
        Schema::table('campeonatos', function (Blueprint $table) {
            $table->dropColumn('cidade_estado');
            $table->string('cidade');
            $table->string('estado');
        });
    }

    public function down()
    {
        Schema::table('campeonatos', function (Blueprint $table) {
            $table->string('cidade_estado');
            $table->dropColumn('cidade');
            $table->dropColumn('estado');
        });
    }
};
