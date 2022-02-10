<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    public const SEXO_ENUM = ["Masculino", "Feminino"];
    public const RACA_ENUM = ["Pardo", "Branco", "Negro", "Indígena", "Amarelo"];

    protected $fillable = [
        "nome",
        "sexo",
        "raca",
        "data_nascimento",
        "cartao_sus",
        "cpf",
        "telefone_1",
        "telefone_2",
    ];

    public function solicitacoes()
    {
        return $this->hasMany('App\Models\Solicitacao', 'solicitante_id', 'id');
    }


    use HasFactory;
}
