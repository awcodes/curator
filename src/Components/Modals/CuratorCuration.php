<?php

namespace Awcodes\Curator\Components\Modals;

use Awcodes\Curator\Components\Forms\Uploader;
use Awcodes\Curator\Models\Media;
use Awcodes\Curator\Resources\MediaResource;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CuratorCuration extends Component
{
    public string $statePath;

    public string $modalId;

    public Media $record;

    public array $presets;

    public function saveCuration($data = null): void
    {
        ray($data);
        // process image
        // save image to directory base on record
        // return curation data
        $this->dispatchBrowserEvent('add-curation', ['curation' => $data, 'statePath' => $this->statePath]);
    }

    public function render(): View
    {
        return view('curator::components.modals.curator-curation');
    }
}
