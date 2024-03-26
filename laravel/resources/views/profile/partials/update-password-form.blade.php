<section>
    <header>
        <h2 class="text-lg font-medium text-white">
            {{ __('Modifica password') }}
        </h2>

        <p class="mt-1 text-sm text-white">
            {{ __('Assicurati che il tuo account utilizzi una password lunga e casuale per rimanere sicuro.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="mb-2 text-white">
            <label for="current_password">{{ __('Password Corrente') }}</label>
            <input class="mt-1 form-control" type="password" name="current_password" id="current_password"
                autocomplete="current-password">
            @error('current_password')
                <span class="invalid-feedback mt-2" role="alert">
                    <strong>{{ $errors->updatePassword->get('current_password') }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-2 text-white">
            <label for="password">{{ __('Nuova Password') }}</label>
            <input class="mt-1 form-control" type="password" name="password" id="password" autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback mt-2" role="alert">
                    <strong>{{ $errors->updatePassword->get('password') }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-2 text-white">

            <label for="password_confirmation">{{ __('Conferma password') }}</label>
            <input class="mt-2 form-control" type="password" name="password_confirmation" id="password_confirmation"
                autocomplete="new-password">
            @error('password_confirmation')
                <span class="invalid-feedback mt-2" role="alert">
                    <strong>{{ $errors->updatePassword->get('password_confirmation') }}</strong>
                </span>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-4">
            <button type="submit" class="btn btn-primary">{{ __('Salva') }}</button>

            @if (session('status') === 'password-updated')
                <script>
                    const show = true;
                    setTimeout(() => show = false, 2000)
                    const el = document.getElementById('status')
                    if (show) {
                        el.style.display = 'block';
                    }
                </script>
                <p id='status' class=" fs-5 text-muted">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>


<style>
    /* STILE FORM */
    .form-bg {
        background-color: #292929;
        padding: 40px;
        border-radius: 17px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.8);
        transform: translateY(10px);
    }

    .form-control {
        border: none;
        border-radius: 5px;
        padding: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1) inset;
        background-color: transparent;
        color: #ffffff;
    }

    .form-control::placeholder {
        color: #ffffff;
    }

    .form-selectl::placeholder {
        color: #ffffff;
    }

    /* END STILE FORM */
</style>
