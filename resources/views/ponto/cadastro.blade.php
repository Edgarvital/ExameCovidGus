@extends('layouts.app')

@section('content')

<div class="container-fluid px-1 py-5 mx-auto" >
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <h1 style="padding-top: 30px;">Cadastro de Ponto</h1>
            <div class="card">
                <form class="form-card" action="{{route('criar_ponto')}}"  method="post">
                    @csrf
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Nome<span
                                    class="text-danger"> *</span></label>
                            <input type="text" id="nome" name="nome" placeholder="Digite o nome do ponto"
                                   required></div>

                        <div class="form-group col-sm-6 flex-column d-flex">
                            <label class="form-control-label px-3">Endereço<span
                                    class="text-danger"> *</span></label>
                            <input type="text" id="endereco" name="endereco" placeholder="Digite o endereço"
                            required></div>
                    </div>

                    <div class="row" style="margin-top: 5%">
                        <div class="form-group col-sm-4 justify-content-start">
                            <button type="submit" class="submit btn-block btn-danger">Cancelar</button>
                        </div>
                        <div class="col-sm-4"></div>
                        <div class="form-group col-sm-4 justify-content-end">
                            <button type="submit" class="submit btn-block btn-primary">Cadastrar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

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
