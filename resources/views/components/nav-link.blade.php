@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-4 border-purple-700 text-base font-bold leading-5 text-gray-900      hover:border-purple-500  transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-4 border-gray-300 text-base font-semibold leading-5 text-gray-500 hover:text-gray-700 hover:border-purple-500 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
