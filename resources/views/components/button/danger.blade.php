@props([
    'type' => 'button',
])

<x-button
    {{ $attributes->merge(['class' => 'bg-red-600 border border-solid border-red-600 hover:bg-red-700 hover:border-red-700 active:bg-red-700 outline-none focus:outline-none ease-linear']) }}>
    {{ $slot }}
</x-button>