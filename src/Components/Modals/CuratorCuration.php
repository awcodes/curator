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
    public $data;

    public $statePath;

    public $modalId;

    public $record;

    public function saveCuration($data = null): void
    {
        ray($data);
    }

    public function render(): View
    {
        return view('curator::components.modals.curator-curation');
    }
}
