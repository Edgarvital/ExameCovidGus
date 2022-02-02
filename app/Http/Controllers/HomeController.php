<?php

namespace App\Http\Controllers;

use App\Models\Sintoma;
use App\Models\Solicitacao;
use App\Models\Solicitante;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function formulario(Request $request)
    {
        $solicitante = Solicitante::where('cpf', '=', $request->cpf)->first();

        if($solicitante != null) {
            $solicitacao = DB::table('solicitacaos')->where('solicitante_id', '=', $solicitante->id)->orderBy('created_at', 'desc')->first();

            $data_ultima_solicitacao = date('Y/m/d', strtotime($solicitacao->created_at));
            $data_bloqueio = date('Y/m/d', strtotime("-60 days"));

            $data1 = new DateTime($data_ultima_solicitacao);
            $data2 = new DateTime($data_bloqueio);
            $diference = $data1->diff($data2);
            if($data_bloqueio >= $data_ultima_solicitacao)
            {

            } else {
                return redirect(route('home'))->with('fail', 'Só é possivel fazer uma nova solicitação em '.$diference->days.' dias');
            }
        } else {
            $sintomas = Sintoma::all();
            $racas = Solicitante::RACA_ENUM;
            $sexos = Solicitante::SEXO_ENUM;
            return view('solicitacao.formulario', ['cpf' => $request->cpf, 'sintomas' => $sintomas, 'racas' => $racas, 'sexos' => $sexos]);
        }
    }

    public function criarFormulario(Request $request)
    {
        return dd($request);
    }

}
