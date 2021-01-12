<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Módulo Lavandería</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="icon" href="imagenes/favicon.png" type="image/x-icon" />
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <script src="{{ asset('js/app.js') }}"></script>
                        <script>navega("/home")</script>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <!--a href="{{ url('/register') }}">Registrate</a-->
                    @endif
                </div>
            @endif
            <div class="content" >
                <div class="subtitle m-b-md">
                    G.C.A.B.A. - Ministerio de Hábitat y Desarrollo Humano<br>
                    Dirección General de Niñez y Adolescencia
                </div>

                <div class="title m-b-md">
                    Módulo Lavandería

                </div>

                
            </div>
        </div>
    </body>
    
</html>
