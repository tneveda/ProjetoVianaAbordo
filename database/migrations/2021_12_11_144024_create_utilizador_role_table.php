<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilizadorRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilizador_role', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_utilizador");
            $table->foreign('id_utilizador')->references('id')->on('users');
            $table->unsignedBigInteger("id_roles");
            $table->foreign('id_roles')->references('id')->on('roles');
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
        Schema::dropIfExists('utilizador_role');
    }
}
