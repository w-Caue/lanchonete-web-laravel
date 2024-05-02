<div>
    <div class="flex flex-col items-start gap-5 my-10 mx-7 md:flex-row">
        <div class="w-full md:w-2/3">

            <div class="rounded-md shadow-md bg-white px-10 py-5">
                <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400 mb-4">
                    Selecione a Forma de Pagamento
                </h1>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <input wire:model="pagamento" wire:click="formaPagamento()" type="radio" id="dinheiro"
                            name="hosting" value="dinheiro" class="hidden peer" required />
                        <label for="dinheiro"
                            class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-purple-600 peer-checked:text-purple-600 peer-checked:bg-purple-100 hover:text-gray-600 hover:bg-gray-100">

                            <div class="flex gap-2 items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-9 h-9">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                </svg>


                                <h1 class="text-md tracking-widest font-semibold uppercase">Dinheiro</h1>
                            </div>
                        </label>
                    </div>

                    <div>
                        <input wire:model="pagamento" wire:click="formaPagamento()" type="radio" id="visa-credito"
                            name="hosting" value="cartão visa-credito" class="hidden peer" required />
                        <label for="visa-credito"
                            class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-purple-600 peer-checked:text-purple-600 peer-checked:bg-purple-100 hover:text-gray-600 hover:bg-gray-100">

                            <div class="flex gap-2 items-center">
                                <svg class="w-9 h-9 border rounded p-1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M22.2215 15.7683L21.9974 14.6431L19.4831 14.6431L19.0837 15.7599L17.0677 15.7643C18.3633 12.6514 19.3247 10.3455 19.952 8.84657C20.1159 8.45511 20.4072 8.25543 20.8364 8.25848C21.1638 8.26094 21.6991 8.26124 22.4421 8.25942L24 15.7648L22.2215 15.7683ZM20.0485 13.1018H21.6692L21.0642 10.2819L20.0485 13.1018ZM7.06069 8.2567L9.08703 8.25933L5.95498 15.7683L3.90367 15.7675C3.21013 13.0896 2.70084 11.1042 2.37581 9.81122C2.27616 9.4148 2.07796 9.13797 1.69702 9.00705C1.35736 8.89031 0.791683 8.7098 0 8.46553V8.25942C1.48023 8.25924 2.55921 8.25924 3.23694 8.25942C3.7974 8.25959 4.12411 8.53015 4.22922 9.08566C4.33473 9.6435 4.60127 11.0616 5.02884 13.3398L7.06069 8.2567ZM11.8702 8.25934L10.2695 15.7676L8.34108 15.7648C8.37914 15.5824 8.91202 13.0797 9.93972 8.2567L11.8702 8.25934ZM15.7815 8.12012C16.3578 8.12012 17.0846 8.2992 17.5035 8.46553L17.1652 10.0221C16.7871 9.87023 16.1657 9.66491 15.6424 9.67294C14.8813 9.68462 14.4117 10.004 14.4117 10.3105C14.4117 10.808 15.2277 11.0586 16.0681 11.603C17.0265 12.2237 17.1531 12.78 17.1412 13.3856C17.1277 14.6413 16.0681 15.8801 13.8322 15.8801C12.8111 15.8648 12.4444 15.7791 11.6122 15.4839L11.9637 13.8595C12.8106 14.2142 13.1698 14.327 13.8935 14.327C14.5569 14.327 15.1263 14.0589 15.1312 13.5919C15.1347 13.2598 14.9316 13.0955 14.1871 12.6847C13.4427 12.2739 12.3994 11.706 12.4128 10.5631C12.43 9.10074 13.815 8.12012 15.7815 8.12012Z">
                                    </path>
                                </svg>

                                <h1 class="text-md tracking-widest font-semibold uppercase">Visa Crédito</h1>
                            </div>
                        </label>
                    </div>

                    <div>
                        <input wire:model="pagamento" wire:click="formaPagamento()" type="radio" id="visa-debito"
                            name="hosting" value="cartão visa-debito" class="hidden peer" required />
                        <label for="visa-debito"
                            class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-purple-600 peer-checked:text-purple-600 peer-checked:bg-purple-100 hover:text-gray-600 hover:bg-gray-100">

                            <div class="flex gap-2 items-center">
                                <svg class="w-9 h-9 border rounded p-1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M22.2215 15.7683L21.9974 14.6431L19.4831 14.6431L19.0837 15.7599L17.0677 15.7643C18.3633 12.6514 19.3247 10.3455 19.952 8.84657C20.1159 8.45511 20.4072 8.25543 20.8364 8.25848C21.1638 8.26094 21.6991 8.26124 22.4421 8.25942L24 15.7648L22.2215 15.7683ZM20.0485 13.1018H21.6692L21.0642 10.2819L20.0485 13.1018ZM7.06069 8.2567L9.08703 8.25933L5.95498 15.7683L3.90367 15.7675C3.21013 13.0896 2.70084 11.1042 2.37581 9.81122C2.27616 9.4148 2.07796 9.13797 1.69702 9.00705C1.35736 8.89031 0.791683 8.7098 0 8.46553V8.25942C1.48023 8.25924 2.55921 8.25924 3.23694 8.25942C3.7974 8.25959 4.12411 8.53015 4.22922 9.08566C4.33473 9.6435 4.60127 11.0616 5.02884 13.3398L7.06069 8.2567ZM11.8702 8.25934L10.2695 15.7676L8.34108 15.7648C8.37914 15.5824 8.91202 13.0797 9.93972 8.2567L11.8702 8.25934ZM15.7815 8.12012C16.3578 8.12012 17.0846 8.2992 17.5035 8.46553L17.1652 10.0221C16.7871 9.87023 16.1657 9.66491 15.6424 9.67294C14.8813 9.68462 14.4117 10.004 14.4117 10.3105C14.4117 10.808 15.2277 11.0586 16.0681 11.603C17.0265 12.2237 17.1531 12.78 17.1412 13.3856C17.1277 14.6413 16.0681 15.8801 13.8322 15.8801C12.8111 15.8648 12.4444 15.7791 11.6122 15.4839L11.9637 13.8595C12.8106 14.2142 13.1698 14.327 13.8935 14.327C14.5569 14.327 15.1263 14.0589 15.1312 13.5919C15.1347 13.2598 14.9316 13.0955 14.1871 12.6847C13.4427 12.2739 12.3994 11.706 12.4128 10.5631C12.43 9.10074 13.815 8.12012 15.7815 8.12012Z">
                                    </path>
                                </svg>

                                <h1 class="text-md tracking-widest font-semibold uppercase">Visa Debito</h1>
                            </div>
                        </label>
                    </div>

                    <div>
                        <input wire:model="pagamento" wire:click="formaPagamento()" type="radio" id="master-credito"
                            name="hosting" value="cartão master-credito" class="hidden peer" required />
                        <label for="master-credito"
                            class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-purple-600 peer-checked:text-purple-600 peer-checked:bg-purple-100 hover:text-gray-600 hover:bg-gray-100">

                            <div class="flex gap-2 items-center">
                                <svg class="w-9 h-9 border rounded p-1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12.001 18.2942C10.916 18.9333 9.65132 19.3 8.30098 19.3C4.2693 19.3 1.00098 16.0316 1.00098 12C1.00098 7.96827 4.2693 4.69995 8.30098 4.69995C9.65132 4.69995 10.916 5.06659 12.001 5.70575C13.0859 5.06659 14.3506 4.69995 15.701 4.69995C19.7327 4.69995 23.001 7.96827 23.001 12C23.001 16.0316 19.7327 19.3 15.701 19.3C14.3506 19.3 13.0859 18.9333 12.001 18.2942ZM13.7027 16.9103C14.3194 17.1615 14.994 17.3 15.701 17.3C18.6281 17.3 21.001 14.9271 21.001 12C21.001 9.07284 18.6281 6.69995 15.701 6.69995C14.994 6.69995 14.3194 6.83837 13.7027 7.08957C14.8821 8.38619 15.601 10.1091 15.601 12C15.601 13.8908 14.8821 15.6137 13.7027 16.9103ZM10.2992 7.08957C9.68255 6.83837 9.00793 6.69995 8.30098 6.69995C5.37387 6.69995 3.00098 9.07284 3.00098 12C3.00098 14.9271 5.37387 17.3 8.30098 17.3C9.00793 17.3 9.68255 17.1615 10.2992 16.9103C9.11986 15.6137 8.40098 13.8908 8.40098 12C8.40098 10.1091 9.11986 8.38619 10.2992 7.08957ZM12.001 8.20521C11.0139 9.16781 10.401 10.5123 10.401 12C10.401 13.4876 11.0139 14.8321 12.001 15.7947C12.9881 14.8321 13.601 13.4876 13.601 12C13.601 10.5123 12.9881 9.16781 12.001 8.20521Z">
                                    </path>
                                </svg>

                                <h1 class="text-md tracking-widest font-semibold uppercase">Mastercard Crédito</h1>
                            </div>
                        </label>
                    </div>

                    <div>
                        <input wire:model="pagamento" wire:click="formaPagamento()" type="radio" id="master-debito"
                            name="hosting" value="cartão master-debito" class="hidden peer" required />
                        <label for="master-debito"
                            class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer peer-checked:border-purple-600 peer-checked:text-purple-600 peer-checked:bg-purple-100 hover:text-gray-600 hover:bg-gray-100">

                            <div class="flex gap-2 items-center">
                                <svg class="w-9 h-9 border rounded p-1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12.001 18.2942C10.916 18.9333 9.65132 19.3 8.30098 19.3C4.2693 19.3 1.00098 16.0316 1.00098 12C1.00098 7.96827 4.2693 4.69995 8.30098 4.69995C9.65132 4.69995 10.916 5.06659 12.001 5.70575C13.0859 5.06659 14.3506 4.69995 15.701 4.69995C19.7327 4.69995 23.001 7.96827 23.001 12C23.001 16.0316 19.7327 19.3 15.701 19.3C14.3506 19.3 13.0859 18.9333 12.001 18.2942ZM13.7027 16.9103C14.3194 17.1615 14.994 17.3 15.701 17.3C18.6281 17.3 21.001 14.9271 21.001 12C21.001 9.07284 18.6281 6.69995 15.701 6.69995C14.994 6.69995 14.3194 6.83837 13.7027 7.08957C14.8821 8.38619 15.601 10.1091 15.601 12C15.601 13.8908 14.8821 15.6137 13.7027 16.9103ZM10.2992 7.08957C9.68255 6.83837 9.00793 6.69995 8.30098 6.69995C5.37387 6.69995 3.00098 9.07284 3.00098 12C3.00098 14.9271 5.37387 17.3 8.30098 17.3C9.00793 17.3 9.68255 17.1615 10.2992 16.9103C9.11986 15.6137 8.40098 13.8908 8.40098 12C8.40098 10.1091 9.11986 8.38619 10.2992 7.08957ZM12.001 8.20521C11.0139 9.16781 10.401 10.5123 10.401 12C10.401 13.4876 11.0139 14.8321 12.001 15.7947C12.9881 14.8321 13.601 13.4876 13.601 12C13.601 10.5123 12.9881 9.16781 12.001 8.20521Z">
                                    </path>
                                </svg>

                                <h1 class="text-md tracking-widest font-semibold uppercase">Mastercard Debito</h1>
                            </div>
                        </label>
                    </div>
                </div>

            </div>
        </div>


        <div class="w-full h-auto px-8 py-10 rounded-md shadow-md bg-white md:w-1/3">
            <div
                class="flex justify-between py-4 text-sm tracking-widest font-semibold uppercase text-gray-600 border-b">
                <span>produtos: </span>
                <span>R${{ number_format($valorProdutos, 2, ',', '') }} </span>
            </div>

            @if ($pagamento)
                <div class="flex flex-col py-4 text-md tracking-widest font-semibold uppercase text-gray-600 border-b">
                    <span class="mb-3">forma de pagamento: </span>
                   
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">{{$pagamento}}:</span>
                        <span>R${{ number_format($valorProdutos, 2, ',', '') }} </span>
                    </div>
                </div>
            @endif

            <div class="flex justify-between py-4 text-lg tracking-widest font-semibold uppercase text-gray-600">
                <span>total: </span>
                <span class="text-xl text-green-500">R${{ number_format($valorProdutos, 2, ',', '') }} </span>
            </div>

            @if ($pagamento)
                <a href="{{ route('ecommerce.pedido') }}"
                    class="flex justify-center w-full py-3 mt-4 text-sm font-semibold text-center text-white uppercase rounded bg-purple-700">
                    Continuar Finalização
                </a>
            @else
                <a href=""
                    class="flex justify-center w-full py-3 mt-4 text-sm font-semibold text-center text-gray-300 uppercase border rounded border-gray-300 cursor-not-allowed">
                    Continuar Finalização
                </a>
            @endif

        </div>

    </div>
</div>
