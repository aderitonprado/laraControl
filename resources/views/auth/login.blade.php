<div class="text-center vsc-initialized">

    <main class="form-signin">
        
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="email" class="form-control" name="email" id="floatingInput" :value="old('email')" required autofocus >
                <label for="floatingInput" value="{{ __('Email') }}">
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" name="password" required autocomplete="current-password" >
                <label for="floatingPassword" value="{{ __('Password') }}" >
            </div>

            <div class="checkbox mb-3">

                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
        </form>
    </main>

</div>
