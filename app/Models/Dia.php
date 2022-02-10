<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    use HasFactory;

    protected $fillable = [
        "data",
    ];

    public function horarios()
    {
        return $this->hasMany('App\Models\Horario', 'dia_id', 'id');
    }

    public function ponto()
    {
        return $this->belongsTo('App\Models\Ponto', 'ponto_id');
    }

}
