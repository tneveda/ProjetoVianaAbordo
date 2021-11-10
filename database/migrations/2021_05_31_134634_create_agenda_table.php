<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("orador");
            $table->string("local");
            $table->string("coordenadas");
            $table->date("data");
            $table->string("cidade");
            $table->integer("lotacao");
            $table->string("cartaz");
            $table->boolean("destaque");
            $table->boolean("ativo");
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
        Schema::dropIfExists('agenda');
    }
}
