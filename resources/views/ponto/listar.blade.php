@extends('layouts.app')

@section('content')

    <style>
        .ui-timepicker-container {
            z-index: 3500 !important;
        }
    </style>

    <div class="container-fluid px-1 py-5 mx-auto">

        <div class="row d-flex justify-content-center">
            <div class="col-xl-10 col-lg-8 col-md-9 col-11 text-center">

                <div class="card" style="background-color: #508f62; color: white; ">
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <h4>Pontos de Exame</h4>
                        </div>
                        <div class="col-sm-2">
                            <a class="btn btn-light" href="{{route('cadastrar_ponto')}}"
                               style="float: right; margin-bottom: 2px">Cadastrar</a>
                        </div>
                    </div>

                    <table class="table table-hover table-dark">
                        <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Endereço</th>
                            <th scope="col" style="width: 10%">Status</th>
                            <th scope="col" style="width: 10%">Ações</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pontos as $ponto)
                            <tr>
                                <td>{{$ponto->nome}}</td>
                                <td>{{$ponto->endereco}}</td>
                                <td>{{$ponto->status}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn" title="Gerar Dias e Horarios" style="color: #08631c"
                                           data-toggle="modal" data-target="#horariosModal"><i
                                                class="fa-solid fa-calendar-plus fa-lg"></i></a>
                                        <a class="btn" title="Editar Ponto" href="#" style="color: #2563eb"><i
                                                class="fa-solid fa-pen-to-square fa-lg"></i></a>
                                        <a class="btn" title="Remover Ponto" href="#" style="color: #ab0e2d;"><i
                                                class="fa-solid fa-trash fa-lg"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    <b>Legenda:</b>
                    <a title="Gerar Dias e Horarios" style="color: #08631c"><i
                            class="fa-solid fa-calendar-plus fa-lg"></i></a>
                    Gerar Dias e Horários Para o Mês Inteiro
                    <a title="Editar Ponto" href="#" style="color: #2563eb; margin-left: 5px"><i
                            class="fa-solid fa-pen-to-square fa-lg"></i></a>
                    Editar Ponto
                    <a title="Remover Ponto" href="#" style="color: #ab0e2d; margin-left: 5px"><i
                            class="fa-solid fa-trash fa-lg"></i></a>
                    Remover Ponto
                </div>
            </div>
        </div>
    </div>

    <!--Modal Para Gerar os Horários -->

    <div class="modal fade" id="horariosModal" tabindex="-1" aria-labelledby="horariosModalLabel"
         aria-hidden="true" style="overflow-y: scroll; max-height:80%;  margin-top: 50px; margin-bottom:50px;">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content" style="border-radius: 12px;">
                <div class="modal-header"
                     style="background-color: #508f62; color: #fff; border-top-left-radius: 12px; border-top-right-radius: 12px; ">
                    <h5 class="modal-title" id="horariosModal">ESCOLHA OS HORÁRIOS PARA CADA TURNO</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formulario" action="{{}}" method="POST">
                        @csrf
                        <div class="container">
                            <div id="manha">
                                <h4 style="text-align: center">Manhã</h4>
                                <hr style="width: 98%">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="inicio">Horário de Inicio</label>
                                        <input placeholder="Selecione o Horário" type="text" id="inicioManha" name="inicioManha"
                                               class="form-control timepicker">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inicio">Horário de Fim</label>
                                        <input placeholder="Selecione o Horário" type="text" id="fimManha" name="fimManha"
                                               class="form-control timepicker">
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <label for="quantMaxManha">Quantidade Máxima de Solicitações</label>
                                        <input class="form-control" type="number" name="quantMaxManha" id="quantMaxManha" value="">
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            </div>

                            <div id="tarde" style="margin-top: 5%">
                                <hr style="width: 98%; margin: 0px">
                                <h4 style="text-align: center">Tarde</h4>
                                <hr style="width: 98%; margin: 0px">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="inicio">Horário de Inicio</label>
                                        <input placeholder="Selecione o Horário" type="text" id="inicioTarde" name="inicioTarde"
                                               class="form-control timepicker">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inicio">Horário de Fim</label>
                                        <input placeholder="Selecione o Horário" type="text" id="fimTarde" name="fimTarde"
                                               class="form-control timepicker">
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <label for="quantMaxManha">Quantidade Máxima de Solicitações</label>
                                        <input class="form-control" type="number" name="quantMaxTarde" id="quantMaxTarde" value="">
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            </div>

                            <div id="noite" style="margin-top: 5%">
                                <hr style="width: 98%; margin: 0px">
                                <h4 style="text-align: center">Noite</h4>
                                <hr style="width: 98%; margin: 0px">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="inicio">Horário de Inicio</label>
                                        <input placeholder="Selecione o Horário" type="text" id="inicioNoite" name="inicioNoite"
                                               class="form-control timepicker">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inicio">Horário de Fim</label>
                                        <input placeholder="Selecione o Horário" type="text" id="fimNoite" name="fimNoite"
                                               class="form-control timepicker">
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <label for="quantMaxManha">Quantidade Máxima de Solicitações</label>
                                        <input class="form-control" type="number" name="quantMaxNoite" id="quantMaxNoite" value="">
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" style="width: 100%;"
                                            form="formulario">GERAR DIAS E HORÁRIOS PARA O MÊS ATUAL
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function () {
            $('input.timepicker').timepicker({
                'timeFormat': 'H:mm',
                'minTime': '07',
                'maxTime': '22'
            });

        });

    </script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
@endsection


