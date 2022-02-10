@extends('layouts.app')

@section('content')
    <div class="container" style="margin-bottom: 1rem;;">
        <div class="row justify-content-center">
            <!-- covid-19 programa de vacinacao -->
            <div class="col-md-9 style_card_apresentacao">
                <div class="container" style="padding-top: 10px;;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row" style="text-align: center;">
                                @if (\Session::has('fail'))
                                    <div class="alert alert-danger" style="width: 100%; text-align: center">
                                        {!! \Session::get('fail') !!}
                                    </div>
                                @endif
                                @error('cpf')
                                    <div class="alert alert-danger" style="width: 100%; text-align: center">
                                        <strong>O CPF digitado não é válido</strong>
                                    </div>
                                @enderror
                                <div class="col-md-12" style="margin-top: 20px;margin-bottom: 10px;">
                                    <img src="{{asset('/img/examecovid.png')}}" alt="Orientação" width="50%"
                                         height="280px">
                                </div>
                                <div class="col-md-12 style_card_apresentacao_subtitulo">Lorem Ipsum é simplesmente uma
                                    simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado
                                    desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os
                                    embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a
                                    cinco séculos, como também ao salto para a editoração eletrônica, permanecendo
                                    essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou
                                    decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser
                                    integrado a softwares de editoração eletrônica como Aldus PageMaker
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-bottom: 32px;">
                            <div class="row ">
                                <div class="col-md-12 style_card_apresentacao_solicitar_vacina text-center">SOLICITAR
                                    EXAME DE COVID
                                </div>
                                <div class="col-md-12 style_card_apresentacao_solicitar_vacina_subtitulo"
                                     style="text-align: center">
                                    Para solicitar seu exame de COVID - 19, clique no botão abaixo e preencha o
                                    formulário.

                                </div>
                                <a type="button" class="btn btn-primary style_card_apresentacao_botao"
                                   style="color: white;margin-top:1.8rem; background-color: gray; border-color: gray"
                                   data-toggle="modal"
                                   data-target="#modalFormulario">FORMULÁRIO</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal checar agendamento -->
    <div class="modal fade" id="modalFormulario" tabindex="-1" aria-labelledby="modalFormularioLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="border-radius: 12px;">
                <div class="modal-header"
                     style="background-color: #508f62; color: #fff; border-top-left-radius: 12px; border-top-right-radius: 12px; ">
                    <h5 class="modal-title" id="modalFormulario">FORMULÁRIO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formulario" action="{{route('formulario')}}" method="GET">
                        @csrf
                        <div class="container">
                            <input type="hidden" name="consulta" value="1">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputCPF" class="style_titulo_input">CPF <span
                                            class="style_titulo_campo">*</span><span class="style_subtitulo_input"> (obrigatório)</span>
                                    </label>
                                    <input type="text"
                                           class="form-control style_input cpf @error('cpf') is-invalid @enderror"
                                           id="inputCPF" placeholder="Ex.: 000.000.000-00" name="cpf"
                                           value="{{old('cpf')}}">

                                    @error('cpf')
                                    <div id="validationServer05Feedback" class="invalid-feedback">
                                        <strong>O CPF digitado não é válido</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 text-center">
                                    <label style="color: red">Para ignorar o bloqueio de 60 dias em caso de exame
                                        negativo, marque a opção abaixo: </label>
                                    <input class="form-check-input" type="checkbox"
                                           id="negativo" name="negativo">
                                    <label class="negativo" for="flexRadioDefault1">Exame Anterior
                                        Negativado <br><span class="style_subtitulo_input"> (Necessário Comprovar)</span></label>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" style="width: 100%;"
                                            form="formulario">PREENCHER FORMULÁRIO
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
