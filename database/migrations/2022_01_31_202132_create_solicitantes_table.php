<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Solicitante;

class CreateSolicitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitantes', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->date("data_nascimento");
            $table->enum('sexo', Solicitante::SEXO_ENUM);
            $table->enum('raca', Solicitante::RACA_ENUM);
            $table->string("cpf");
            $table->string("cartao_sus");
            $table->string("telefone_1");
            $table->string("telefone_2");


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
        Schema::dropIfExists('solicitantes');
    }
}
