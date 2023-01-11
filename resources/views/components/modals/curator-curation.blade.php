<div x-data="curation({
        statePath: '{{ $statePath }}',
        fileName: '{{ $record->name }}',
        fileType: '{{ $record->type }}',
        presets: @js($presets)
    })"
     class="curator curation h-full absolute inset-0 flex flex-col"
     x-on:add-curation.window="$dispatch('close-modal', { id: '{{ $modalId }}' })"
>

    <div class="flex-1 relative flex flex-col lg:flex-row overflow-hidden">

        <div class="flex-1 h-full overflow-auto p-4">
            <div>
            <img
                x-ref="image"
                src="{{ $record->url }}"
                x-on:ready="setData"
                x-on:crop="updateData"
            />
            </div>
        </div>

        <div class="w-full lg:h-full lg:max-w-xs overflow-auto bg-gray-100 dark:bg-gray-900/30 flex flex-col shadow-top lg:shadow-none z-[1]">
            <div class="flex-1 overflow-hidden">
                <div class="flex flex-col h-full overflow-y-auto">
                    <h2 class="font-bold py-2 px-4 mb-0">
                        Adjustments
                    </h2>

                    <div class="flex-1 overflow-auto px-4 pb-4">
                        <form x-on:submit.prevent="null">
                            <div class="space-y-3">
                                <label class="text-xs" x-show="presets" x-cloak>
                                    <span class="block">Presets</span>
                                    <select name="preset" class="mt-1 block w-full transition duration-75 focus:border-primary-500 focus:ring-1 focus:ring-inset focus:ring-primary-500 disabled:opacity-70 dark:bg-gray-700 dark:text-white dark:focus:border-primary-500 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm bg-gray-400 dark:bg-gray-800 text-sm" x-model="preset">
                                        <option value="custom">Custom</option>
                                        <template x-for="preset in presets">
                                            <option x-bind:value="preset.key" x-bind:key="preset.key" x-text="preset.name"></option>
                                        </template>
                                    </select>
                                </label>
                                <x-curator::curation-input type="text" prefix="X" suffix="px" name="x" x-on:input="setCropBoxX($event)" x-bind:value="data.x" />
                                <x-curator::curation-input type="text" prefix="Y" suffix="px" name="y" x-on:input="setCropBoxY($event)" x-bind:value="data.y" />
                                <x-curator::curation-input type="text" prefix="Width" suffix="px" name="width" x-on:input="setCropBoxWidth($event)" x-bind:value="cropBoxData.width" />
                                <x-curator::curation-input type="text" prefix="Height" suffix="px" name="height" x-on:input="setCropBoxHeight($event)" x-bind:value="cropBoxData.height" />
                                <x-curator::curation-input type="text" prefix="Rotate" suffix="deg" name="rotate" x-on:input="cropper.rotateTo($event.target.value)" x-bind:value="data.rotate" />
                            </div>

                            <div class="flex items-center w-full mt-3">
                                <x-filament::button type="button" size="sm" color="secondary" class="!rounded-l-lg !rounded-r-none flex-1" x-on:click="cropper.setAspectRatio(16/9)">16:9</x-filament::button>
                                <x-filament::button type="button" size="sm" color="secondary" class="!rounded-none flex-1" x-on:click="cropper.setAspectRatio(4/3)">4:3</x-filament::button>
                                <x-filament::button type="button" size="sm" color="secondary" class="!rounded-none flex-1" x-on:click="cropper.setAspectRatio(1)">1:1</x-filament::button>
                                <x-filament::button type="button" size="sm" color="secondary" class="!rounded-r-lg !rounded-l-none flex-1" x-on:click="cropper.setAspectRatio(2/3)">2:3</x-filament::button>
                            </div>

                            <div class="flex items-center w-full mt-3">
                                <x-filament::button type="button" size="sm" color="secondary" class="!rounded-l-lg !rounded-r-none flex-1" x-on:click="cropper.zoom(0.1)" x-tooltip.raw="Zoom In">
                                    <span class="sr-only">Zoom in</span>
                                    @svg('heroicon-o-zoom-in', 'w-4 h-4')
                                </x-filament::button>
                                <x-filament::button type="button" size="sm" color="secondary" class="!rounded-r-lg !rounded-l-none flex-1" x-on:click="cropper.zoom(-0.1)" x-tooltip.raw="Zoom Out">
                                    <span class="sr-only">Zoom out</span>
                                    @svg('heroicon-o-zoom-out', 'w-4 h-4')
                                </x-filament::button>
                            </div>

                            <div class="flex items-center w-full mt-3">
                                <x-filament::button type="button" size="sm" color="secondary" class="!rounded-l-lg !rounded-r-none flex-1" x-on:click="flipHorizontally" x-tooltip.raw="Flip horizontally">
                                    <span class="sr-only">Flip horizontally</span>
                                    <svg class="w-4 h-4" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m3 7l5 5l-5 5V7m18 0l-5 5l5 5V7m-9 13v2m0-8v2m0-8v2m0-8v2"/></svg>
                                </x-filament::button>
                                <x-filament::button type="button" size="sm" color="secondary" class="!rounded-r-lg !rounded-l-none flex-1" x-on:click="flipVertically" x-tooltip.raw="Flip vertically">
                                    <span class="sr-only">Flip vertically</span>
                                    <svg class="w-4 h-4" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m17 3l-5 5l-5-5h10m0 18l-5-5l-5 5h10M4 12H2m8 0H8m8 0h-2m8 0h-2"/></svg>
                                </x-filament::button>
                            </div>

                            <div class="flex items-center w-full mt-3">
                                <x-filament::button type="button" size="sm" color="secondary" class="!rounded-l-lg !rounded-r-none flex-1" x-on:click="cropper.setDragMode('move')" x-tooltip.raw="Drag Mode">
                                    <span class="sr-only">Drag Mode</span>
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M13 6v5h5V7.75L22.25 12L18 16.25V13h-5v5h3.25L12 22.25L7.75 18H11v-5H6v3.25L1.75 12L6 7.75V11h5V6H7.75L12 1.75L16.25 6H13Z"/></svg>
                                </x-filament::button>
                                <x-filament::button type="button" size="sm" color="secondary" class="!rounded-r-lg !rounded-l-none flex-1" x-on:click="cropper.setDragMode('crop')" x-tooltip.raw="Crop Mode">
                                    <span class="sr-only">Crop Mode</span>
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M17 23v-4H7q-.825 0-1.412-.587Q5 17.825 5 17V7H1V5h4V1h2v16h16v2h-4v4Zm0-8V7H9V5h8q.825 0 1.413.588Q19 6.175 19 7v8Z"/></svg>
                                </x-filament::button>
                            </div>

                            <div class="flex items-center w-full mt-3">
                                <x-filament::button type="button" size="sm" color="secondary" class="flex-1" x-on:click="cropper.reset()">Reset</x-filament::button>
                            </div>
                        </form>
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
