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
        return $this->hasMany('App\Models\Contato', 'solicitacao_id', 'id');
    }

    public function endereco()
    {
        return $this->belongsTo('App\Models\Endereco', 'endereco_id', 'id');
    }

    public function sintomas()
    {
        return $this->belongsToMany('App\Models\Sintoma', 'solicitacao_sintoma', 'solici_id', 'sintoma_id');
    }

    public function horarios()
    {
        return $this->hasMany('App\Models\Horario', 'solicitacao_id', 'id');
    }

    use HasFactory;
}
