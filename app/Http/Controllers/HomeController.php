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
        $solicitacao = null;
        if($solicitante != null)
        {
            $solicitacao = DB::table('solicitacaos')->where('solicitante_id', '=', $solicitante->id)->orderBy('created_at', 'desc')->first();
        }

        //Caso em que já existe uma solicitação e o exame anterior não negativou
        if($solicitacao != null && $request->negativo == null) {
            $bloqueio = $this->bloqueio($solicitacao);
            if($bloqueio != false){
                return redirect(route('home'))->with('fail', 'Só é possivel fazer uma nova solicitação em '.$bloqueio.' dias');
            }
        }

        //Caso em que já existe uma solicitação e o periodo do bloqueio expirou ou já existe uma solicitação mas o exame anterior negativou
        if(($solicitacao != null && $this->bloqueio($solicitacao) == false) || ($solicitante != null && $request->negativo != null)){
            $sintomas = Sintoma::all();
            $racas = Solicitante::RACA_ENUM;
            $sexos = Solicitante::SEXO_ENUM;
            return view('solicitacao.formulario', ['cpf' => $request->cpf, 'sintomas' => $sintomas, 'racas' => $racas, 'sexos' => $sexos,
                'negativo' => $request->negativo, 'solicitacao' => $solicitacao]);
        }

        //Caso em que não existe registro do solicitante ainda
        if($solicitacao == null || $solicitante == null) {
            $sintomas = Sintoma::all();
            $racas = Solicitante::RACA_ENUM;
            $sexos = Solicitante::SEXO_ENUM;
            return view('solicitacao.formulario', ['cpf' => $request->cpf, 'sintomas' => $sintomas, 'racas' => $racas, 'sexos' => $sexos, 'negativo' => $request->negativo]);
        }
    }

    public function bloqueio($solicitacao){
        $data_ultima_solicitacao = date('Y/m/d', strtotime($solicitacao->created_at));
        $data_bloqueio = date('Y/m/d', strtotime("-60 days"));

        $data1 = new DateTime($data_ultima_solicitacao);
        $data2 = new DateTime($data_bloqueio);
        $diference = $data1->diff($data2)->days;
        if($data_bloqueio < $data_ultima_solicitacao){
            return $diference;
        } else {
            return false;
        }
    }

}
