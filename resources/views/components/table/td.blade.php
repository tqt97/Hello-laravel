@props([
    'checkbox' => false,
    'center' => false,
])


@php
$center = $center ?? false ? 'text-center' : 'text-left';
$classes = $checkbox ?? false ? 'py-3 pl-6 text-center' : 'py-3 px-6 text-left ' . $center;
@endphp

<td {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</td>
