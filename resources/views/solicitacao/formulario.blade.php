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
                    <form class="form-card" action="{{route('solicitar')}}" method="POST">
                        @csrf
                        <input type="hidden" name="cpf" value="{{$cpf}}">

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Nome Completo<span
                                        class="text-danger"> *</span></label>
                                <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo"
                                       required></div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Cartão do SUS<span
                                        class="text-danger"> *</span></label>
                                <input type="text" id="cartaosus" name="cartaosus"
                                       placeholder="Digite seu Cartão do SUS" required>
                            </div>
                        </div>

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Telefone 1<span
                                        class="text-danger"> *</span></label>
                                <input type="text" id="tel1" name="tel1"
                                       placeholder="Digite o número do primeiro telefone" required></div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Telefone 2</label>
                                <input type="text" id="tel2" name="tel2"
                                       placeholder="Digite o número do segundo telefone">
                            </div>
                        </div>

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Raça/Cor<span class="text-danger"> *</span>
                                </label>
                                <select class="form-select" id="raca" name="raca" required>
                                    <option value="" selected disabled>Selecione sua Raça/Cor</option>
                                    @foreach($racas as $raca)
                                        <option value="{{$raca}}">{{$raca}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Sexo<span class="text-danger"> *</span>
                                </label>
                                <select class="form-select" aria-label="Default select example" id="sexo" name="sexo"
                                        required>
                                    <option value="" selected disabled>Selecione seu sexo</option>
                                    @foreach($sexos as $sexo)
                                        <option value="{{$sexo}}">{{$sexo}}</option>
                                    @endforeach
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
                                       name="data_de_nascimento" value="{{old('data_de_nascimento')}}" required>
                            </div>
                        </div>

                        <h4>Endereço</h4>
                        <hr style="width: 100%; margin-top: 0px">

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Logradouro<span
                                        class="text-danger"> *</span></label>
                                <input type="text" id="logradouro" name="logradouro" placeholder="Digite o logradouro"
                                       required>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Bairro<span
                                        class="text-danger"> *</span></label>
                                <input type="text" id="bairro" name="bairro"
                                       placeholder="Digite o bairro" required>
                            </div>
                        </div>

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Numero<span
                                        class="text-danger"> *</span></label>
                                <input type="text" id="numero" name="numero"
                                       placeholder="Digite o número da residência" required></div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Complemento</label>
                                <input type="text" id="complemento" name="complemento"
                                       placeholder="Digite o complemento">
                            </div>
                        </div>

                        <h4>Sintomas</h4>
                        <hr style="width: 100%; margin-top: 0px">


                        <div class="row justify-content-between text-left" style="margin-left: 5%">

                            @foreach($sintomas as $sintoma)
                                <div class="form-group col-sm-4 flex-column d-flex">
                                    <div class="form-check">
                                        <input class="checkboxes form-check-input" type="checkbox"
                                               value="{{$sintoma->nome}}"
                                               id="{{$sintoma->nome}}"
                                               name="sintomas[]">
                                        <label class="form-check-label" for="{{$sintoma->nome}}">
                                            {{$sintoma->nome}}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-12 flex-column d-flex">
                                <label class="form-control-label px-3">Data do Inicio dos Sintomas:<span
                                        class="text-danger"> *</span></label>
                                <input type="date"
                                       id="data_inicio_sintoma"
                                       placeholder="dd/mm/aaaa" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}"
                                       name="data_inicio_sintomas" value="{{old('data_inicio_sintomas')}}" required>
                            </div>
                        </div>
                        <div id="contatoPositivo" style="display:none;">
                            <h4>Contato de Positivo</h4>
                            <hr style="width: 100%; margin-top: 0px">

                            <div class="row justify-content-between text-left">
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Nome do Contato:<span
                                            class="text-danger"> *</span></label>
                                    <input type="text" id="nome_contato" name="nome_contato"
                                           placeholder="Digite o nome do contato" required></div>
                                <div class="form-group col-sm-6 flex-column d-flex">
                                    <label class="form-control-label px-3">Dias desde o contato: <span
                                            class="text-danger"> *</span>
                                    </label>

                                    <input type="number" id="dias_contato" name="dias_contato"
                                           placeholder="Digite a quantidades de dias desde o contato com o positivo"
                                           required>
                                </div>
                            </div>
                        </div>

                        <h4>Contato Domiciliar</h4>
                        <hr style="width: 100%; margin-top: 0px">

                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-12 flex-column d-flex">
                                <label class="form-control-label px-3">Nome(s):<span
                                        class="text-danger"> *</span></label>
                                <input type="text" id="nomes_contatos" name="nomes_contatos"
                                       placeholder="Digite os nomes dos contatos domiciliares" required>
                            </div>
                        </div>


                        <div class="row justify-content-end" style="margin-top: 5%">
                            <div class="form-group col-sm-6">
                                <button type="submit" class="submit btn-block btn-primary">Solicitar Exame</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(".submit").click(function () {
            if ($('.checkboxes').filter(':checked').length < 1) {
                alert("Selecione ao menos uma opção de sintoma!");
                return false;
            }
        });
    </script>

    <script>
        //Ajustes de contato de positivo
        $(function () {
            $("#Nenhum").click(function () {
                if ($(this).is(":checked")) {
                    $("#contatoPositivo").slideDown();
                    $('.checkboxes').each(function () {
                        if (!$(this).prop('checked')) {
                            $(this).prop('disabled', true);
                        } else {
                            $(this).prop('checked', false);
                            $(this).prop('disabled', true);
                        }
                    });
                    $(this).prop('checked', true);
                    $(this).prop('disabled', false)
                    $("#nome_contato").attr('required', true)
                    $("#dias_contato").attr('required', true)
                } else {
                    $("#contatoPositivo").slideUp();
                    $('.checkboxes').each(function () {
                        $(this).prop('disabled', false);
                    });
                    $("#nome_contato").attr('required', false)
                    $("#dias_contato").attr('required', false)
                }
            });
        });
    </script>

    <style>

        h4 {
            color: #205e88;
            margin-top: 20px;
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

