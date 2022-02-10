<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sintoma extends Model
{
    protected $fillable = [
        "nome",
    ];

    public function solicitacoes()
    {
        return $this->belongsToMany('App\Models\Solicitacao', 'solicitacao_sintoma',
            'sintoma_id', 'solici_id');
    }

    use HasFactory;
}
