@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-indigo-900 w-full bold'
            : 'text-white w-full bold';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
