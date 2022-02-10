@extends('layouts.app')

@section('content')
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-10 col-lg-8 col-md-9 col-11 text-center" >
                <div class="card" style="background-color: #508f62; color: white">
                    <h4>Pontos de Exame</h4>
                    <table class="table table-hover table-dark" style="">
                        <thead>
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ações</th>
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
                                        <a class="btn" title="Gerar Dias e Horarios" href="#" style="color: #08631c"><i
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


@endsection
