<?php

namespace App\Http\Controllers;

use App\Models\Sintoma;
use App\Models\Solicitante;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function formulario(Request $request)
    {
        $sintomas = Sintoma::all();
        $racas = Solicitante::RACA_ENUM;
        $sexos = Solicitante::SEXO_ENUM;
        return view('solicitacao.formulario', ['cpf' => $request->cpf, 'sintomas' => $sintomas, 'racas' => $racas, 'sexos' => $sexos]);
    }

    public function criarFormulario(Request $request)
    {
        return dd($request);
    }

}
