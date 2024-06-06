@props([
    'type' => 'button',
])

<x-button
    {{ $attributes->merge(['class' => 'inset-y-0 right-0 p-1 font-medium leading-5 text-white transition-colors duration-150 bg-green-600 rounded-md active:bg-green-600 hover:bg-green-700 focus:shadow-outline-green transition-all duration-300 hover:scale-95']) }}>
    {{ $slot }}
</x-button>
