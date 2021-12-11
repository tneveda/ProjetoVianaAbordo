<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username');
            $table->integer('contacto_movel') ->nullable();
            $table->string('ocupacao_profissional') ->nullable();
            $table->string('ocupacao_profissional_ing') ->nullable();
            $table->string('linkedin') ->nullable();
            $table->text('motivo') ->nullable();
            $table->boolean('validacao') ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('contacto_movel');
            $table->dropColumn('ocupacao_profissional');
            $table->dropColumn('ocupacao_profissional_ing');
            $table->dropColumn('linkedin');
            $table->dropColumn('motivo');
            $table->dropColumn('validacao');
            
        });
    }
}
