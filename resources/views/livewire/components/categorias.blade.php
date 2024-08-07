<div>
    @foreach ($categorias as $categoria)
        <div class="my-2 flex gap-2">
            <x-checkbox.primary check="N"></x-checkbox.primary>

            <h1 class="text-sm text-gray-500 font-semibold uppercase tracking-widest">{{ $categoria->nome }}</h1>
        </div>
    @endforeach
</div>
