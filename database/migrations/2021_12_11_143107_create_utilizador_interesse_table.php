<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilizadorInteresseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilizador_interesse', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_utilizador");
            $table->foreign('id_utilizador')->references('id')->on('users');
            $table->unsignedBigInteger("id_interesse");
            $table->foreign('id_interesse')->references('id')->on('area_interesse');
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
        Schema::dropIfExists('utilizador_interesse');
    }
}
