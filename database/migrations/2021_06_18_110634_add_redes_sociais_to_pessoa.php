<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRedesSociaisToPessoa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pessoa', function (Blueprint $table) {
            $table->string('facebook');
            $table->string('linkedin');
            $table->string('twitter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pessoa', function (Blueprint $table) {
            $table->dropColumn('facebook');
            $table->dropColumn('linkedin');
            $table->dropColumn('twitter');
        });
    }
}
