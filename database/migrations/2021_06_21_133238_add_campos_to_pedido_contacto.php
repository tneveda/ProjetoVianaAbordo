<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposToPedidoContacto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pedido_contacto', function (Blueprint $table) {
            $table->string('nome');
            $table->string('email');
            $table->text('mensagem');
            $table->boolean("respondido");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedido_contacto', function (Blueprint $table) {
            $table->dropColumn('nome');
            $table->dropColumn('email');
            $table->dropColumn('mensagem');
            $table->dropColumn("respondido");
        });
    }
}
