<div>
    <div class="mx-6 my-10">

        @if ($combos)
            <div class="flex  flex-wrap gap-3 my-1 mx-5">
                @foreach ($combos as $combo)
                    <div x-data x-on:click="$dispatch('open-detalhe')" wire:key="{{ $combo->id }}"
                        class=" flex flex-col justify-center">
                        <div class="py-3 sm:max-w-lg sm:mx-auto">
                            <div
                                class="bg-white shadow-lg border-gray-100 max-h-80 border sm:rounded-3xl p-8 flex space-x-8">
                                <div class="h-48 overflow-visible w-1/2">
                                    <img class="rounded-3xl shadow-lg"
                                        src="https://www.themoviedb.org/t/p/w600_and_h900_bestv2/1LRLLWGvs5sZdTzuMqLEahb88Pc.jpg"
                                        alt="">
                                </div>
                                <div class="flex flex-col w-1/2 space-y-4">
                                    <div class="flex justify-between items-start">
                                        <h2 class="text-2xl font-bold">{{ $combo->nome }}</h2>
                                    </div>
                                    <div>
                                        <div class="text-sm text-gray-400">Series</div>
                                        <div class="text-lg text-gray-800">2019</div>
                                    </div>
                                    <p class=" text-gray-400 max-h-40 overflow-y-hidden">{{ $combo->descricao }}</p>
                                    <div class="flex text-2xl font-bold text-a">
                                        R${{ number_format($combo->valor_total, 2, ',') }}</div>
                                </div>

                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif
    </div>

</div>
