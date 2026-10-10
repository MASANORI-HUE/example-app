@props([
    'href' => '',
    'theme' => 'primary',
])

@php
    $themeClasses = [
        'primary' => 'text-white bg-blue-500 hover:bg-blue-600 focus:ring-blue-500',
        'secondary' => 'text-white bg-red-500 hover:bg-red-600 focus:ring-red-500',
    ];
    
    $baseClasses = 'inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2';
@endphp

<a href="{{ $href }}" {{ $attributes
    ->merge(['class' => $baseClasses])
    ->merge(['class' => $themeClasses[$theme] ?? $themeClasses['primary']]) }}>
    {{ $slot }}
</a>