@extends('layouts.ecommerce')

@section('content')
    <div class="flex flex-col mt-8 md:flex-row body-font">

        <div class="flex-1 p-8">
            <h4 class="mb-4 text-lg font-semibold text-center tracking-widest">
                FAZER LOGIN
            </h4>
            <div class="flex flex-col w-full gap-4">
                <form method="POST" action="{{ route('login') }}" class="bg-white rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    <div class="mb-4">
                        <label class="font-semibold text-md text-gray-600 uppercase tracking-widest">
                            Email
                        </label>

                        <x-input-ecommerce class="'email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                            id="username" type="email"></x-input-ecommerce>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="font-semibold text-md text-gray-600 uppercase tracking-widest" for="password">
                            Senha
                        </label>

                        <x-input-ecommerce class="@error('password') is-invalid @enderror" name="password" id="password"
                            type="password" value="{{ old('password') }}"></x-input-ecommerce>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="flex justify-center gap-2">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Entrar
                        </button>

                    </div>
                </form>


                <button
                    class="mb-4 text-base font-normal text-gray-600 tracking-widest text-center hover:text-blue-500 hover:underline">
                    Esqueci minha senha
                </button>
            </div>

        </div>

        <div class="flex-1 p-8 border-t-2 md:border-l-2 md:border-t-0">
            <h4 class="mb-4 text-lg font-semibold text-center">
                CRIAR MINHA CONTA
            </h4>
            {{-- <div class="flex flex-col w-full gap-5"> --}}
            <form method="POST" action="{{ route('register') }}" class="flex flex-col w-full gap-2">
                @csrf

                <label class="w-full" for="">
                    <label class="font-semibold text-md text-gray-600 uppercase tracking-widest">
                        Nome
                    </label>

                    <x-input-ecommerce id="name" type="text" class="@error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name"></x-input-ecommerce>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>

                <label class="w-full" for="">
                    <label class="font-semibold text-md text-gray-600 uppercase tracking-widest">
                        Email
                    </label>

                    <x-input-ecommerce id="email" type="text" class="@error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email"></x-input-ecommerce>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>

                <label class="w-full" for="">
                    <label class="font-semibold text-md text-gray-600 uppercase tracking-widest">
                        whatsapp
                    </label>

                    <x-input-ecommerce id="whatsapp" type="tel" class="@error('whatsapp') is-invalid @enderror"
                        name="whatsapp" value="{{ old('whatsapp') }}" required autocomplete="whatsapp"></x-input-ecommerce>

                    @error('whatsapp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>

                <div class="flex gap-2">
                    <label class="w-full" for="">
                        <label class="font-semibold text-md text-gray-600 uppercase tracking-widest">
                            senha
                        </label>

                        <x-input-ecommerce id="password" type="password" class="@error('password') is-invalid @enderror"
                            name="password" value="{{ old('password') }}" required
                            autocomplete="new-password"></x-input-ecommerce>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>

                    <label class="w-full" for="">
                        <label class="font-semibold text-md text-gray-600 uppercase tracking-widest">
                            confirmar senha
                        </label>

                        <x-input-ecommerce id="password_confirmation" type="password" name="password_confirmation"
                            value="{{ old('password') }}" required autocomplete="new-password"></x-input-ecommerce>
                    </label>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="p-2 border rounded bg-blue-500 text-white font-semibold">
                        {{ __('Cadastrar') }}
                    </button>
                </div>

            </form>

            {{-- </div> --}}

        </div>

    </div>
@endsection
