@php
    $currentItem = $getCurrentItem();
    $statePath = $getStatePath();
@endphp

<x-forms::field-wrapper :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$statePath"
>

    <div
        x-data="{ state: $wire.entangle('{{ $statePath }}') }"
        x-on:add-curation.window="$event.detail.statePath == '{{ $statePath }}' ? state = $event.detail.curation.id : null"
        class="w-full curator-curation-form-component"
    >
        @if (! $currentItem)
            <x-filament::button
                type="button"
                color="{{ $getColor() }}"
                outlined="{{ $isOutlined() }}"
                size="{{ $getSize() }}"
                wire:click="mountFormComponentAction('{{ $statePath }}', 'curator_curation')"
            >
                {{ $getButtonLabel() }}
            </x-filament::button>
        @else
            <div class="transition duration-75 overflow-hidden border border-gray-300 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 dark:text-white grid md:grid-cols-2 gap-3">
                <div class="relative block w-full h-40 checkered p-4">
                    <img
                        src="{{ $currentItem['url'] }}"
                        width="{{ $currentItem['width'] }}"
                        height="{{ $currentItem['height'] }}"
                        alt=""
                        class="w-full h-full object-contain"
                    />
                </div>
                <div>
                    <dl class="px-3 pb-3 md:py-3">
                        <div class="flex gap-2">
                            <dt class="font-bold">Key: </dt>
                            <dd>{{ $currentItem['key'] }}</dd>
                        </div>
                        <div class="flex gap-2">
                            <dt class="font-bold">Width: </dt>
                            <dd>{{ $currentItem['width'] }}</dd>
                        </div>
                        <div class="flex gap-2">
                            <dt class="font-bold">Height: </dt>
                            <dd>{{ $currentItem['height'] }}</dd>
                        </div>
                    </dl>
                </div>
            </div>
        @endif
    </div>

</x-forms::field-wrapper>
