@extends('layouts.app')

@section('content')
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
                    Gerar Dias e Horários
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
         aria-hidden="true">
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
                    <form id="formulario" action="{{route('formulario')}}" method="GET">
                        @csrf
                        <div class="container">
                           <!-- Time Picker -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
