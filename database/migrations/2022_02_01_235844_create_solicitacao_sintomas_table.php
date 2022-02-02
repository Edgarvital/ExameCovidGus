<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitacaoSintomasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacao_sintomas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("sintoma_id");
            $table->foreign('sintoma_id')->references('id')->on('sintomas');
            $table->unsignedBigInteger("solicitacao_id");
            $table->foreign('solicitacao_id')->references('id')->on('solicitacaos');
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
        Schema::dropIfExists('solicitacao_sintomas');
    }
}
