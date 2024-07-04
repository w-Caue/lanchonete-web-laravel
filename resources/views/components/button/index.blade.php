@aware(['type'])

<button type="{{ $type }}"
    {{ $attributes->merge([
        'class' =>
            'p-2 text-xs font-semibold uppercase text-white tracking-widest leading-5 transition-colors duration-150 hover:scale-95 rounded focus:outline-blue focus:shadow-outline-blue',
    ]) }}>
    {{ $slot }}
</button>
