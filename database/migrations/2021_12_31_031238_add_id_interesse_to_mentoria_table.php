<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdInteresseToMentoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mentoria', function (Blueprint $table) {
            $table->unsignedBigInteger("id_interesse");
            $table->foreign('id_interesse')->references('id')->on('area_interesse');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mentoria', function (Blueprint $table) {
            $table->dropColumn('id_interesse');
        });
    }
}
