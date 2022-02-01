<?php

namespace App\Http\Controllers;

use App\Models\Sintoma;
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
        return view('solicitacao.formulario', ['cpf' => $request->cpf, 'sintomas' => $sintomas]);
    }

}
