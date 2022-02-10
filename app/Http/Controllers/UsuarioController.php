<?php

namespace App\Http\Controllers;

use App\Models\Dia;
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

        return redirect(route('dashboard'))->with('sucess', 'Ponto '.$ponto->nome. ' Cadastrado com Sucesso!\nPreencha as informações sobre os dias e horários de funcionamento.');
    }

    function gerarDiasPonto($ponto_id)
    {
        $ponto = Ponto::find($ponto_id);

        $hoje = today();
        $ultimoDia = date("Y-m-t", strtotime($hoje));

        $data1 = new DateTime($hoje);
        $data2 = new DateTime($ultimoDia);
        $diasFimMes = $data1->diff($data2)->days;

        for ($i = 1; $i <= $diasFimMes; $i++)
        {
            $dia = new Dia();
            $dia->data = date('d-m-Y', strtotime(today().'+'.$i.' day'));
            $dia->ponto_id = 1;
            $dia->save();
        }

        return redirect(route('dashboard'))->with('sucess', 'Dias gerados para o ponto ' . $ponto->nome. ' com sucesso!');

    }
}
