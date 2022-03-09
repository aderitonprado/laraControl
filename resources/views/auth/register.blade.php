<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tela de login do LaraControl">
    <meta name="author" content="Adériton Prado">
    <title>LaraControl - Registro</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

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


        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <img class="mb-4" src="{{ url('assets/img/logo-santa-cruz.png') }}" alt=""
                width="100" height="100">
            <h1 class="h3 mb-3 fw-normal">Registrar</h1>

            <div class="form-floating">
                <input type="text" name="name" class="form-control" id="floatingInput" :value="old('name')" required
                    autofocus placeholder="Seu nome">
                <label for="floatingInput" value="{{ __('Name') }}">Nome</label>
            </div>

            <div class="form-floating">
                <input type="email" name="email" class="form-control" id="floatingInput" :value="old('email')" required
                    autofocus placeholder="Seu e-mail">
                <label for="floatingInput" value="{{ __('Email') }}">Seu e-mail</label>
            </div>
            
            <div class="form-floating">
                <input type="password" name="password" class="form-control" :value="{{ old('password') }}" id="floatingPassword" placeholder="Sua senha" autocomplete="new-password">
                <label for="floatingPassword" value="{{ __('Password') }}">Sua senha</label>
            </div>

            <div class="form-floating">
                <input type="password" name="password_confirmation" class="form-control" :value="{{ old('password') }}" id="floatingPassword" placeholder="Sua senha" autocomplete="new-password">
                <label for="floatingPassword" value="{{ __('Confirm Password') }}">Confirme a senha</label>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>

            
            
            <button class="w-100 btn btn-lg btn-success" type="submit">{{ __('Registrar') }}</button>

            <p class="mt-5 text-muted">&copy; 2021</p>
            <p class="mb-3 text-muted">Desenvolvido por: Adériton Prado</p>
        </form>
    </main>


</body>

</html>