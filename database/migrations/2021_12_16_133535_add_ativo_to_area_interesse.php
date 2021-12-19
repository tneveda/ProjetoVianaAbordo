<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAtivoToAreaInteresse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('area_interesse', function (Blueprint $table) {
            $table->string('ativo', 9);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('area_interesse', function (Blueprint $table) {
            $table->dropColumn('ativo');
        });
    }
}
