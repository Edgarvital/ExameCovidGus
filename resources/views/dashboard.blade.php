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
                                <div class="" >
                                    <table class="table table-bordered table-hover" style="display: block; overflow-x: visible; white-space: nowrap; border-radius:10px;">

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

                                        <td style="text-align: center;overflow-x:hidden;text-overflow:ellipsis">Secretaria de Saúde</td>
                                        <td style="text-align: center;overflow-x:hidden;text-overflow:ellipsis">10/02/2022</td>
                                        <td style="text-align: center;overflow-x:hidden;text-overflow:ellipsis">125</td>
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

</body>


@include('layouts.footer')

</html>
