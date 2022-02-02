<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        "logradouro",
        "bairro",
        "numero",
        "complemento",
        "solicitaca_id",
    ];

    public function solicitacao()
    {
        return $this->hasOne(Solicitacao::class, 'endereco_id', 'id');
    }
    use HasFactory;
}
