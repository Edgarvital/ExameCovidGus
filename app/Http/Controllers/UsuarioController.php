<?php

namespace App\Http\Controllers;

use App\Models\Dia;
use App\Models\Horario;
use App\Models\Ponto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

class UsuarioController extends Controller
{
    function criarPonto(Request $request)
    {
        $ponto = new Ponto();
        $ponto->nome = $request->nome;
        $ponto->endereco = $request->endereco;
        $ponto->status = 'Ativo';
        $ponto->usuario_id = Auth::user()->id;
        $ponto->save();

        return redirect(route('pontos'))->with('sucess', 'Ponto '.$ponto->nome. ' Cadastrado com Sucesso!'.'<br>'.'Preencha as informações sobre os dias e horários de funcionamento.');
    }

    function gerarDiasPonto(Request $request)
    {
        $request->inicioManha = date('H:i:s',strtotime($request->inicioManha));
        $request->fimManha = date('H:i:s',strtotime($request->fimManha));
        $request->inicioTarde = date('H:i:s',strtotime($request->inicioTarde));
        $request->fimTarde = date('H:i:s',strtotime($request->fimTarde));
        $request->inicioNoite = date('H:i:s',strtotime($request->inicioNoite));
        $request->fimNoite = date('H:i:s',strtotime($request->fimNoite));

        $validated = $request->validate([
            'fimManha'        => ['after:inicioManha'],
            'fimTarde'        => ['after:inicioTarde'],
            'fimNoite'        => ['after:inicioNoite'],
        ]);

        $ponto = Ponto::find($request->ponto_id);

        $amanha = date('d-m-Y', strtotime(today().'+1 day'));
        $diaAmanha = Dia::where('data', $amanha)->first();
        if($diaAmanha != null)
        {
            return redirect(route('pontos'))->with('fail', 'Os dias e horários para este mês já foram criados, por favor edite manualmente os horários ou remova-os e gere novamente os dias e horários.');
        }

        $hoje = today();
        $ultimoDia = date("Y-m-t", strtotime($hoje));

        $data1 = new DateTime($hoje);
        $data2 = new DateTime($ultimoDia);
        $diasFimMes = $data1->diff($data2)->days;

        for ($i = 1; $i <= $diasFimMes; $i++)
        {
            $dia = new Dia();
            $dia->data = date('d-m-Y', strtotime(today().'+'.$i.' day'));
            $dia->ponto_id = $ponto->id;
            $dia->save();

            $horarioManha = new Horario();
            $horarioManha->inicio = $request->inicioManha;
            $horarioManha->fim = $request->fimManha;
            $horarioManha->quantMaxSolic = $request->quantMaxManha;
            $horarioManha->quantSolic = 0;
            $horarioManha->dia_id = $dia->id;
            $horarioManha->turno = 'Manhã';
            $horarioManha->save();

            $horarioTarde = new Horario();
            $horarioTarde->inicio = $request->inicioTarde;
            $horarioTarde->fim = $request->fimTarde;
            $horarioTarde->quantMaxSolic = $request->quantMaxTarde;
            $horarioTarde->quantSolic = 0;
            $horarioTarde->dia_id = $dia->id;
            $horarioTarde->turno = 'Tarde';
            $horarioTarde->save();

            $horarioNoite = new Horario();
            $horarioNoite->inicio = $request->inicioNoite;
            $horarioNoite->fim = $request->fimNoite;
            $horarioNoite->quantMaxSolic = $request->quantMaxNoite;
            $horarioNoite->quantSolic = 0;
            $horarioNoite->dia_id = $dia->id;
            $horarioNoite->turno = 'Noite';
            $horarioNoite->save();
        }

        return redirect(route('pontos'))->with('sucess', 'Dias gerados para o ponto ' . $ponto->nome. ' com sucesso!');

    }

    public function cadastrarPonto(){
        return view('ponto.cadastro');
    }

    function listarPontos()
    {
        $pontos = Ponto::all();
        return view('ponto.listar', compact('pontos'));
    }

}
