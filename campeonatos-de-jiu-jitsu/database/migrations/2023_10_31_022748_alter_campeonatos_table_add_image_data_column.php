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
            $table->dropColumn('imagem_crop');
            $table->longText('imagem')->nullable()->after('titulo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('campeonatos', function (Blueprint $table) {
            $table->dropColumn('imagem_crop');
            $table->string('imagem')->nullable()->after('titulo');
        });
    }
};
