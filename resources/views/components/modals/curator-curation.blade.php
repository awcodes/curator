<div x-data="curation({
        statePath: '{{ $statePath }}',
        fileName: '{{ $record->name }}',
        fileType: '{{ $record->type }}',
    })"
     x-on:clear-selected="selected = null"
     x-on:insert-media.window="$dispatch('close-modal', { id: '{{ $modalId }}' })"
     class="curator curation h-full absolute inset-0 flex flex-col"
>

    <div class="flex-1 relative flex flex-col lg:flex-row overflow-hidden">

        <div class="flex-1 h-full overflow-auto p-4">
            <div>
            <img
                x-ref="cropper"
                src="{{ $record->url }}"
            />
            </div>
        </div>

        <div class="w-full lg:h-full lg:max-w-xs overflow-auto bg-gray-100 dark:bg-gray-900/30 flex flex-col shadow-top lg:shadow-none" style="z-index: 1;">
            <div class="flex-1 overflow-hidden">
                <div class="flex flex-col h-full overflow-y-auto">
                    <h4 class="font-bold py-2 px-4 mb-0">
                        Adjustments
                    </h4>

                    <div class="flex-1 overflow-auto px-4 pb-4">

                    </div>

                    <div class="flex items-center justify-start gap-3 py-3 px-4 border-t border-gray-300 bg-gray-200 dark:border-gray-800 dark:bg-black/10">
                        <x-filament::button
                            type="button"
                            size="sm"
                            x-on:click="saveCuration"
                        >
                            Save Curation
                        </x-filament::button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
