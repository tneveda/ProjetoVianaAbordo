<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaleriaAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeria_agenda', function (Blueprint $table) {
            $table->id();
            $table->string("descricao");
            $table->string("media");
            $table->unsignedBigInteger("id_agenda");
            $table->foreign('id_agenda')->references('id')->on('agenda');
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
        Schema::dropIfExists('galeria_agenda');
    }
}
