<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    protected $fillable = [
        "data_inicio_sintoma",
        "solicitante_id",
    ];

    public function contatos()
    {
        return $this->hasMany(Contato::class, 'solicitacao_id', 'id');
    }

    public function endereco()
    {
        return $this->belongsTo(Endereco::class, 'endereco_id', 'id');
    }

    public function sintomas()
    {
        return $this->belongsToMany(Sintoma::class, 'solicitacao_sintoma', 'solici_id', 'sintoma_id');
    }

    use HasFactory;
}
