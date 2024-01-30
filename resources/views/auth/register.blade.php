@extends('layouts.site')

@section('content')
    <div class="w-full">
        <h1 class="text-center text-xl font-semibold mb-5">{{ __('Cadastrar Usuario') }}</h1>

        <div class="flex justify-center m-3">
            <div class="w-full max-w-prose m-4 border rounded-lg shadow-lg">
                <form method="POST" action="{{ route('register') }}" class="bg-white rounded px-8 pt-6 pb-8 mb-4">
                    @csrf

                    <label class="w-full" for="">
                        <p class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">{{ __('Nome') }}</p>

                        <input id="name" type="text"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>

                    <label class="w-full" for="">
                        <p class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">{{ __('E-mail') }}</p>

                        <input id="email" type="text"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>

                    <label class="w-full" for="">
                        <p class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">{{ __('Whatsapp') }}</p>

                        <input id="telefone" type="telefone"
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('telefone') is-invalid @enderror"
                            name="telefone" value="{{ old('telefone') }}" required autocomplete="telefone">

                        @error('telefone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>

                    <div class="flex gap-2">
                        <label class="w-full" for="">
                            <p class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">{{ __('Senha') }}</p>

                            <input id="password" type="password"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </label>

                        <label class="w-full" for="">
                            <p class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                {{ __('Confirmar Senha') }}</p>

                            <input id="password-confirm" type="password"
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                name="password_confirmation" required autocomplete="new-password">
                        </label>
                    </div>

                    <div class="flex justify-center">
                        <button type="submit" class="p-2 border rounded bg-blue-500 text-white font-semibold">
                            {{ __('Cadastrar') }}
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
