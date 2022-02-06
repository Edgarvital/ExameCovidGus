<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use App\Models\Endereco;
use App\Models\Sintoma;
use App\Models\Solicitante;
use App\Models\Solicitacao;
use App\Models\SolicitacaoSintoma;
use Illuminate\Http\Request;

class SolicitacaoController extends Controller
{
    function criarSolicitacao(Request $request)
    {

        $solicitante = Solicitante::where('cpf', '=', $request->cpf)->first();
        if ($solicitante == null) {

            //Criação do Solicitante
            $solicitante = new Solicitante();

            $solicitante->cpf = $request->cpf;
            $solicitante->cartao_sus = $request->cartaosus;
            $solicitante->nome = $request->nome;
            $solicitante->telefone_1 = $request->tel1;
            if ($request->tel2 != null) {
                $solicitante->telefone_2 = $request->tel2;
            }
            $solicitante->raca = $request->raca;
            $solicitante->sexo = $request->sexo;
            $solicitante->data_nascimento = $request->data_de_nascimento;

            $solicitante->save();
        }

        //Criação de Endereço
        $endereco = new Endereco();
        $endereco->logradouro = $request->logradouro;
        $endereco->bairro = $request->bairro;
        $endereco->numero = $request->numero;
        if ($request->complemento != null) {
            $endereco->complemento = $request->complemento;
        }

        $endereco->save();

        //Criação da Solicitação
        $solicitacao = new Solicitacao();
        $solicitacao->status = 'Aguardando Avaliação';
        $solicitacao->data_inicio_sintoma = $request->data_inicio_sintomas;
        $solicitacao->nomes_contatos = $request->nomes_contatos;
        $solicitacao->solicitante_id = $solicitante->id;
        $solicitacao->endereco_id = $endereco->id;

        $solicitacao->save();
        $sintoma_nenhum = null;
        //Criação dos Sintomas
        foreach ($request->sintomas as $sintoma) {
            if($sintoma == 'Nenhum')
            {
                $sintoma_nenhum = $sintoma;
            }
            $solicitacao_sintomas = new SolicitacaoSintoma();
            $sintoma = Sintoma::where('nome', '=', $sintoma)->first();
            $solicitacao_sintomas->sintoma_id = $sintoma->id;
            $solicitacao_sintomas->solicitacao_id = $solicitacao->id;
            $solicitacao_sintomas->save();
        }

        if($sintoma_nenhum != null)
        {
            //Criação do Contato Positivo
            $contato = new Contato();
            $contato->nome = $request->nome_contato;
            $contato->dias_contato = $request->dias_contato;

            $solicitacao->contato_id = $contato->id;
            $solicitacao->update();

            $contato->save();
        }

        return view('welcome');
    }
}
