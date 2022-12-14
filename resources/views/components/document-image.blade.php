@props([
    'label' => null,
    'iconSize' => 'md',
])

@php
$iconClasses = [
    'sm' => 'w-4 h-4',
    'md' => 'w-8 h-8',
    'lg' => 'w-10 h-10',
    'xl' => 'w-12 h-12',
];
@endphp

<div @class([
    'grid place-items-center w-full h-full bg-gray-200 text-sm',
    'dark:bg-gray-700' => config('filament.dark_mode'),
    $attributes->get('class')
])>
    @svg('heroicon-s-document', ['class' => $iconClasses[$iconSize]])
    <span class="sr-only">{{ $label }}</span>
</div>
