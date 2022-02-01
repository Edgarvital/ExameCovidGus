@extends('layouts.app')

@section('content')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">

    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <h1 style="margin-top: -4%">Formulário</h1>
                <p class="blue-text">Formulário para solicitação do exame de covid-19.</p>
                <div class="card">
                    <h4>Dados Pessoais</h4>
                    <hr style="width: 100%; margin-top: 0px">
                    <form class="form-card" onsubmit="event.preventDefault()">
                        <input type="hidden" name="cpf" value="{{$cpf}}">

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Nome Completo<span
                                        class="text-danger"> *</span></label>
                                <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo"
                                       onblur="validate(1)"></div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Cartão do SUS<span
                                        class="text-danger"> *</span></label>
                                <input type="text" id="cartaosus" name="cartaosus"
                                       placeholder="Digite seu Cartão do SUS"
                                       onblur="validate(2)">
                            </div>
                        </div>

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Telefone 1<span
                                        class="text-danger"> *</span></label>
                                <input type="text" id="tel1" name="tel1"
                                       placeholder="Digite o número do primeiro telefone" onblur="validate(3)"></div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Telefone 2</label>
                                <input type="text" id="tel2" name="tel2"
                                       placeholder="Digite o número do segundo telefone" onblur="validate(4)">
                            </div>
                        </div>

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Raça/Cor<span class="text-danger"> *</span>
                                </label>
                                <select class="form-select" id="raca" name="raca" aria-label="Default select example">
                                    <option selected>Selecione sua Raça/Cor</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Sexo<span class="text-danger"> *</span>
                                </label>
                                <select class="form-select" aria-label="Default select example" id="sexo" name="sexo">
                                    <option selected>Selecione seu sexo</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Data de Nascimento<span
                                        class="text-danger"> *</span>
                                </label>
                                <input type="date" class="@error('data_de_nascimento') is-invalid @enderror"
                                       id="inputData"
                                       placeholder="dd/mm/aaaa" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}"
                                       name="data_de_nascimento" value="{{old('data_de_nascimento')}}">
                            </div>
                        </div>

                        <h4>Endereço</h4>
                        <hr style="width: 100%; margin-top: 0px">

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Logradouro<span
                                        class="text-danger"> *</span></label>
                                <input type="text" id="logradouro" name="logradouro" placeholder="Digite o logradouro"
                                       onblur="validate(1)"></div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Bairro<span
                                        class="text-danger"> *</span></label>
                                <input type="text" id="bairro" name="bairro"
                                       placeholder="Digite o bairro"
                                       onblur="validate(2)">
                            </div>
                        </div>

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Numero<span
                                        class="text-danger"> *</span></label>
                                <input type="text" id="numero" name="numero" placeholder="Digite o número da residência"
                                       onblur="validate(1)"></div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Complemento</label>
                                <input type="text" id="complemento" name="complemento"
                                       placeholder="Digite o complemento"
                                       onblur="validate(2)">
                            </div>
                        </div>

                        <h4>Sintomas</h4>
                        <hr style="width: 100%; margin-top: 0px">

                        <div class="row justify-content-between text-left" style="margin-left: 5%">

                                @foreach($sintomas as $sintoma)
                                <div class="form-group col-sm-4 flex-column d-flex">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="{{$sintoma->nome}}" name="{{$sintoma->nome}}">
                                        <label class="form-check-label" for="{{$sintoma->nome}}">
                                            {{$sintoma->nome}}
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                        </div>

                        <div class="row justify-content-end" style="margin-top: 5%">
                            <div class="form-group col-sm-6">
                                <button type="submit" class="btn-block btn-primary">Solicitar Exame</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validate(val) {
            v1 = document.getElementById("fname");
            v2 = document.getElementById("lname");
            v3 = document.getElementById("email");
            v4 = document.getElementById("mob");
            v5 = document.getElementById("job");
            v6 = document.getElementById("ans");

            flag1 = true;
            flag2 = true;
            flag3 = true;
            flag4 = true;
            flag5 = true;
            flag6 = true;

            if (val >= 1 || val == 0) {
                if (v1.value == "") {
                    v1.style.borderColor = "red";
                    flag1 = false;
                } else {
                    v1.style.borderColor = "green";
                    flag1 = true;
                }
            }

            if (val >= 2 || val == 0) {
                if (v2.value == "") {
                    v2.style.borderColor = "red";
                    flag2 = false;
                } else {
                    v2.style.borderColor = "green";
                    flag2 = true;
                }
            }
            if (val >= 3 || val == 0) {
                if (v3.value == "") {
                    v3.style.borderColor = "red";
                    flag3 = false;
                } else {
                    v3.style.borderColor = "green";
                    flag3 = true;
                }
            }
            if (val >= 4 || val == 0) {
                if (v4.value == "") {
                    v4.style.borderColor = "red";
                    flag4 = false;
                } else {
                    v4.style.borderColor = "green";
                    flag4 = true;
                }
            }
            if (val >= 5 || val == 0) {
                if (v5.value == "") {
                    v5.style.borderColor = "red";
                    flag5 = false;
                } else {
                    v5.style.borderColor = "green";
                    flag5 = true;
                }
            }
            if (val >= 6 || val == 0) {
                if (v6.value == "") {
                    v6.style.borderColor = "red";
                    flag6 = false;
                } else {
                    v6.style.borderColor = "green";
                    flag6 = true;
                }
            }

            flag = flag1 && flag2 && flag3 && flag4 && flag5 && flag6;

            return flag;
        }
    </script>

    <style>

        h4 {
            color: #205e88;
        }
        .card {
            padding: 30px 40px;
            margin-top: 30px;
            margin-bottom: 20px;
            border-radius: 2%;
            border: none !important;
            box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2)
        }

        .blue-text {
            color: #00BCD4
        }

        .form-control-label {
            margin-bottom: 0
        }

        input,
        textarea,
        select,
        button {
            padding: 8px 15px;
            border-radius: 5px !important;
            margin: 5px 0px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            font-size: 18px !important;
            font-weight: 300
        }

        input:focus,
        textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #00BCD4;
            outline-width: 0;
            font-weight: 400
        }

        .btn-block {
            text-transform: uppercase;
            font-size: 15px !important;
            font-weight: 400;
            height: 43px;
            cursor: pointer
        }

        .btn-block:hover {
            color: #fff !important
        }

        button:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0
        }
    </style>
@endsection

