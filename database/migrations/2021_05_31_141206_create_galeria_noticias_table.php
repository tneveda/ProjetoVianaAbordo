<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleriaNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeria_noticias', function (Blueprint $table) {
            $table->id();
            $table->string("descricao");
            $table->string("media");
            $table->unsignedBigInteger("id_noticia");
            $table->foreign('id_noticia')->references('id')->on('noticias');
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
        Schema::dropIfExists('galeria_noticias');
    }
}
