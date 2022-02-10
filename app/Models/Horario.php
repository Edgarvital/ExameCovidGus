<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $fillable = [
        "inicio",
        "fim",
        "quantMaxSolic",
        "quantSolic",
        "turno"
    ];

    public function dia()
    {
        return $this->belongsTo('App\Models\Dia', 'dia_id');
    }
}
