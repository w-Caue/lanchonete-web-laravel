@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'p-3 pl-2 text-xs text-gray-600 font-semibold tracking-widest uppercase rounded shadow-sm w-full border border-gray-400']) !!}>
