<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    public const SEXO_ENUM = ["Masculino", "Feminino", "Não informar"];
    public const RACA_ENUM = ["Pardo", "Branco", "Negro", "Indígena", "Amarelo" ,"Não informar"];

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
        return $this->hasMany(Solicitacao::class, 'solicitante_id', 'id');
    }


    use HasFactory;
}
