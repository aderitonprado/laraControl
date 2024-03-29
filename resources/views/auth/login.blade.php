<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tela de login do LaraControl">
    <meta name="author" content="Adériton Prado">
    <title>LaraControl - Login</title>

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('assets/img/favicons/apple-touch-icon.png') }} " sizes="180x180">
    <link rel="icon" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}" sizes="32x32" type="image/png">
    <link rel="icon" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}" sizes="16x16" type="image/png">
    <link rel="manifest" href=" {{ url('assets/img/favicons/manifest.json') }} ">
    <link rel="mask-icon" href="{{ asset('assets/img/favicons/safari-pinned-tab.svg') }} " color="#7952b3">
    <link rel="icon" href="{{ asset('assets/img/favicons/favicon.ico') }}">
    <meta name="theme-color" content="#7952b3">


    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>
</head>

<body class="text-center">

    <main class="form-signin">

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <img class="mb-4" src="{{ url('assets/img/logo-santa-cruz.png') }}" alt=""
                width="100" height="100">
            <h1 class="h3 mb-3 fw-normal">Entrar</h1>

            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" :value="old('email')" required
                    autofocus placeholder="Seu e-mail">
                <label for="floatingInput" value="{{ __('Email') }}">Seu e-mail</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword"
                    placeholder="Sua senha">
                <label for="floatingPassword">Sua senha</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Lembrar-me
                </label>
            </div>
            <div class="checkbox mb-3">
                <label>
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-muted" href="{{ route('password.request') }}">
                            {{ __('Esqueceu sua senha?') }}
                        </a>
                    @endif
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-success" type="submit">{{ __('Entrar') }}</button>

            <p class="mt-5 text-muted">&copy; 2021</p>
            <p class="mb-3 text-muted">Desenvolvido por: Adériton Prado</p>
        </form>
    </main>


</body>

</html>
