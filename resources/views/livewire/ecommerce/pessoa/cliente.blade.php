<div>
    <div class="flex justify-center mt-2">
        <div class="w-full px-10 py-10 rounded-lg shadow-lg bg-white md:w-1/2">
            <div class="flex justify-between pb-8 border-b">
                <h1 class="text-2xl font-semibold">Suas Informações</h1>
                <h2 class="text-2xl font-semibold">Cliente</h2>
            </div>

            <form action="" class="flex flex-col items-center justify-center mt-2">
                <label class="w-full" for="">
                    <p class="uppercase tracking-wide text-gray-500 text-md font-semibold mb-2">{{ __('Nome') }}</p>

                    <input id="name" type="text"
                        class="appearance-none block w-96 font-semibold text-gray-700 border-2 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>

                {{-- <label class="w-full" for="">
                    <p class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">{{ __('E-mail') }}</p>

                    <input id="email" type="text"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label> --}}

                <label class="w-full" for="">
                    <p class="uppercase tracking-wide text-gray-500 text-md font-semibold mb-2">{{ __('Whatsapp') }}</p>

                    <input id="whatsapp" type="whatsapp"
                        class="appearance-none block w-96 font-semibold text-gray-700 border-2 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('whatsapp') is-invalid @enderror"
                        name="whatsapp" value="{{ old('whatsapp') }}" required autocomplete="whatsapp">

                    @error('whatsapp')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>
            </form>
        </div>
    </div>
</div>
