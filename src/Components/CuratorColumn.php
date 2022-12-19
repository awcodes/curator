<?php

namespace Awcodes\Curator\Components;

use Awcodes\Curator\Facades\Curator;
use Awcodes\Curator\Models\Media;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Str;

class CuratorColumn extends ImageColumn
{
    protected string $view = 'curator::components.curator-column';

    public function isImage(): bool
    {
        $state = $this->getState();

        if (filled($state)) {
            if (is_a($state, Media::class)) {
                $url = $state->filename;
            } else {
                $url = $state;
            }

            $ext = Str::of($url)->afterLast('.');

            return Curator::isResizable($ext);
        }

        return false;
    }
}
