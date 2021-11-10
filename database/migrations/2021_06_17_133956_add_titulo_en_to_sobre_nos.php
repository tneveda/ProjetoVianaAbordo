<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTituloEnToSobreNos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sobre_nos', function (Blueprint $table) {
            $table->string('titulo_en');
            $table->string('corpo_en');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sobre_nos', function (Blueprint $table) {
            $table->dropColumn('titulo_en');
            $table->dropColumn('corpo_en');
        });
    }
}
