@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'p-2 pl-2 text-sm text-gray-600 font-semibold rounded shadow-sm w-full border border-gray-400']) !!}>
