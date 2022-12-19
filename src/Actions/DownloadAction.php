<?php

namespace Awcodes\Curator\Actions;

use Awcodes\Curator\Components\CuratorPicker;
use Filament\Forms\Components\Actions\Action;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DownloadAction extends Action
{
    public static function getDefaultName(): ?string
    {
        return 'curator_download';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->action(function (CuratorPicker $component): StreamedResponse {
            $item = resolve(config('filament-curator.model'))->where('id', $component->getState())->first();

            return Storage::disk($item['disk'])->download($item['filename']);
        });
    }
}
