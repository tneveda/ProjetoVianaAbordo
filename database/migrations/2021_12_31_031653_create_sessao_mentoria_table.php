<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessaoMentoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessao_mentoria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_mentoria");
            $table->foreign('id_mentoria')->references('id')->on('mentoria');
            $table->date("data");
            $table->time("hora");
            $table->string("imagem");
            $table->string("link_reuniao");
            $table->string("estado");
            $table->string("estado_en");
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
        Schema::dropIfExists('sessao_mentoria');
    }
}
