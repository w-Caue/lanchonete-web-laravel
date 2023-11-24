@extends('layouts.site')

@section('content')
    <div class="">
        <div class="flex flex-col">
            <h1 class="text-center text-2xl text-gray-700 font-semibold mt-5">{{ __('Cadastre-Se') }}</h1>

            <div class="flex justify-center">
                <div class="w-1/2 m-4 border rounded shadow-lg">
                    <form method="POST" action="{{ route('register') }}" class="bg-white rounded px-8 pt-6 pb-8 mb-4">
                        @csrf

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                                <label for="name"
                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">{{ __('Nome') }}</label>

                                <input id="name" type="text"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                                <label for="email"
                                    class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">{{ __('Email') }}</label>

                                <input id="email" type="text"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="w-full md:w-80 px-3 mb-6 md:mb-0">
                                <label for="telefone"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Telefone') }}</label>

                                <input id="telefone" type="telefone"
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('telefone') is-invalid @enderror"
                                    name="telefone" value="{{ old('telefone') }}" required autocomplete="telefone">

                                @error('telefone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Senha') }}</label>

                                    <input id="password" type="password"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>

                                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Confirma a Senha') }}</label>

                                    <input id="password-confirm" type="password"
                                        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                        name="password_confirmation" required autocomplete="new-password">

                                </div>
                            </div>

                        </div>
                        <div class="flex justify-center">
                            <div class="">
                                <button type="submit" class="p-2 border rounded bg-blue-500 text-white font-semibold">
                                    {{ __('Cadastrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
