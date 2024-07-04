@props([
    'type' => 'button',
])

<x-button
    {{ $attributes->merge(['class' => 'bg-blue-600 border border-solid border-blue-600 hover:bg-blue-700 hover:border-blue-700 active:bg-blue-700 outline-none focus:outline-none ease-linear']) }}>
    {{ $slot }}
</x-button>
