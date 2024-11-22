@props(['active'])

@php
    $baseClasses = 'inline-flex items-center px-3 py-2 text-sm font-medium leading-5 transition duration-300 ease-in-out relative overflow-hidden';
    $activeClasses = $active ?? false
        ? 'text-indigo-600 dark:text-indigo-400'
        : 'text-gray-600 dark:text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400';
    $classes = $baseClasses . ' ' . $activeClasses;
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="relative z-10">
        {{ $slot }}
    </span>
    <span class="absolute inset-x-0 bottom-0 h-0.5 bg-indigo-600 dark:bg-indigo-400 transform scale-x-0 transition-transform duration-300 ease-out origin-left group-hover:scale-x-100"></span>
    <span class="absolute inset-0 transform scale-x-0 transition-transform duration-300 ease-out origin-left group-hover:scale-x-100 bg-indigo-50 dark:bg-indigo-900 opacity-10 -z-10"></span>
</a>

