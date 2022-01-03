<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilizadorMentoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilizador_mentoria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_mentorando");
            $table->foreign('id_mentorando')->references('id')->on('users');
            $table->unsignedBigInteger("id_mentoria");
            $table->foreign('id_mentoria')->references('id')->on('mentoria');
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
        Schema::dropIfExists('utilizador_mentoria');
    }
}
