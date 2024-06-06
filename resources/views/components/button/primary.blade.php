@props([
    'type' => 'button',
])

<x-button
    {{ $attributes->merge(['class' => 'text-white p-2 bg-blue-500 border border-solid border-blue-500 hover:bg-blue-600 hover:text-white active:bg-blue-600 outline-none focus:outline-none ease-linear transition-all duration-150 transition-all duration-300 hover:scale-95']) }}>
    {{ $slot }}
</x-button>
