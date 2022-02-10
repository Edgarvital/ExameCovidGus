<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ponto extends Model
{
    use HasFactory;

    protected $fillable = [
        "nome",
        "endereco",
        "status"
    ];

    public function dias()
    {
        return $this->hasMany('App\Models\Dia', 'ponto_id', 'id');
    }
}
