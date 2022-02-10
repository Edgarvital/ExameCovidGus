<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
{{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="{{asset('js/jquery-3.3.1.js')}}" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
            integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
          integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{asset('/css/styles.css')}}">
</head>
<body>

@include('dashboard2')

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




@include('layouts.footer')

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

</html>
