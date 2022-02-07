<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacaos', function (Blueprint $table) {
            $table->id();
            $table->date("data_inicio_sintoma");
            $table->string('status');
            $table->string('nomes_contatos');
            $table->boolean('negativo');

            $table->unsignedBigInteger("endereco_id");
            $table->foreign('endereco_id')->references('id')->on('enderecos');

            $table->unsignedBigInteger("solicitante_id");
            $table->foreign('solicitante_id')->references('id')->on('solicitantes');

            $table->unsignedBigInteger("contato_id")->nullable();
            $table->foreign('contato_id')->references('id')->on('contatos');

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
        Schema::dropIfExists('solicitacaos');
    }
}
