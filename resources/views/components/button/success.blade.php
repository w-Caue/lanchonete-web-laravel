@props([
    'type' => 'button',
])

<x-button
    {{ $attributes->merge(['class' => 'bg-green-600 border border-solid border-green-600 hover:bg-green-700 hover:border-green-700 active:bg-green-700 outline-none focus:outline-none ease-linear']) }}>
    {{ $slot }}
</x-button>
