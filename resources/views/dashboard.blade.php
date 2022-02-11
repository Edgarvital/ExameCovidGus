@extends('layouts.app')

@section('content')

    <div class="container" style="margin-bottom: 1rem;padding-bottom: 100px; padding-top: 100px;">
        <div class="row justify-content-center">
            @if (\Session::has('sucess'))
                <div class="alert alert-success col-md-9" style="width: 100%; text-align: center;margin-bottom: 0px;">
                    {!! \Session::get('sucess') !!}
                </div>
            @endif
            @if (\Session::has('error'))
                <div class="alert alert-danger col-md-9" style="width: 100%; text-align: center;margin-bottom: 0px;">
                    {!! \Session::get('error') !!}
                </div>
            @endif
            <div class="col-md-9 style_card_apresentacao">
                <div class="container" style="padding-top: 10px;;">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row" style="text-align: center;">

                                <div class="col-md-12 align-content-md-center">
                                    <h1>BEM VINDO AO SISTEMA</h1>
                                    <hr>
                                </div>


                                <!--TESTE-->
                                <div class="container align-content-center">

                                    <div class="row justify-content-center titulo-menu mb-0">
                                        <h4>Dados do Dia </h4>
                                    </div>
                                    <div class="">
                                        <table class="table table-bordered table-hover"
                                               style="display: block; overflow-x: visible; white-space: nowrap; border-radius:10px;">

                                            <thead>
                                            <tr>
                                                <th scope="col" style="width:200px; text-align: center;">Ponto</th>
                                                <th scope="col" style="width:200px; text-align: center;">Dia</th>
                                                <th scope="col" style="width:200px; text-align: center;">Manhã</th>
                                                <th scope="col" style="width:200px; text-align: center;">Tarde</th>
                                                <th scope="col" style="width:200px; text-align: center;">Noite</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <td style="text-align: center;overflow-x:hidden;text-overflow:ellipsis">
                                                Secretaria de Saúde
                                            </td>
                                            <td style="text-align: center;overflow-x:hidden;text-overflow:ellipsis">
                                                10/02/2022
                                            </td>
                                            <td style="text-align: center;overflow-x:hidden;text-overflow:ellipsis">
                                                125
                                            </td>
                                            <td style="text-align: center;">40</td>
                                            <td style="text-align: center;">30</td>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
