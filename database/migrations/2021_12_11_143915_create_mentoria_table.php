<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentoria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_mentor");
            $table->foreign('id_mentor')->references('id')->on('users');
            $table->string("titulo");
            $table->string("titulo_ing");
            $table->text('descricao');
            $table->text('descricao_en');
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
        Schema::dropIfExists('mentoria');
    }
}
