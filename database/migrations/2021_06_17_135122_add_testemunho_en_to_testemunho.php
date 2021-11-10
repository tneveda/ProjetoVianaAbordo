<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTestemunhoEnToTestemunho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testemunho', function (Blueprint $table) {
            $table->text('testemunho_en');
            $table->string('profissao_en');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testemunho', function (Blueprint $table) {
            $table->dropColumn('testemunho_en');
            $table->dropColumn('profissao_en');
        });
    }
}
