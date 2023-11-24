<div>
    <div class="flex flex-col">
        <div class="flex justify-center mt-7">
            @if ($pedido->status != 'Aberto')
                <div class="flex justify-center flex-col items-center border shadow-xl rounded-md w-1/2 h-auto m-5">

                    <h2 class="mb-2 text-2xl font-semibold text-gray-700">Acompanhe seu Pedido:</h2>
                    <ul class="max-w-md space-y-1 text-gray-500 list-inside ">
                        <li class="flex items-center font-semibold text-green-500">
                            <svg class="w-3.5 h-3.5 me-2  flex-shrink-0"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            Pedido em Analise
                        </li>
                        <li class="flex items-center text-green-500 font-semibold">
                            <svg class="w-3.5 h-3.5 me-2 flex-shrink-0"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            Seu pedido foi para o Preparo
                        </li>
                        <li class="flex items-center">
                            <svg class="w-3.5 h-3.5 me-2 text-gray-500 flex-shrink-0"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                            </svg>
                            At least one special character, e.g., ! @ # ?
                        </li>
                    </ul>

                </div>
            @endif

        </div>

    </div>
</div>
