@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex justify-center">

            <div class="text-center font-semibold text-2xl mb-3">{{ __('Login') }}</div>

            <div class="w-full max-w-prose">
                <form method="POST" action="{{ route('login') }}" class="bg-white rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Email
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border shadow rounded py-3 px-4 mb-3 leading-tight focus:outline-none @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" id="username" type="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            Senha
                        </label>
                        <input
                            class="appearance-none block w-full text-gray-700 border shadow rounded py-3 px-4 mb-3 leading-tight focus:outline-none @error('password') is-invalid @enderror"
                            name="password" id="password" type="password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>

                        <label class="font-semibold text-sky-700" for="remember">
                            {{ __('Mantenha-me Conectado') }}
                        </label>
                    </div>

                    <div class="flex items-center justify-between gap-2">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Entrar
                        </button>

                        @if (Route::has('password.request'))
                            <a class="font-semibold text-sky-700" href="{{ route('password.request') }}">
                                {{ __('Esqueceu Sua Senha?') }}
                            </a>
                        @endif
                    </div>
                </form>
                <p class="text-center text-gray-500 text-xs">
                    &copy;2023 Cauê Desenvolvedor Web.
                </p>
            </div>

        </div>
    </div>
@endsection
