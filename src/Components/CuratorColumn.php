<?php

namespace Awcodes\Curator\Components;

use Awcodes\Curator\Facades\Curator;
use Awcodes\Curator\Models\Media;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Str;
use Throwable;

class CuratorColumn extends ImageColumn
{
    protected string $view = 'curator::components.curator-column';

    public function getImagePath(): ?string
    {
        $state = $this->getState();

        if (! $state) {
            return null;
        }

        if (is_string($state)) {
            return $state;
        }

        /** @var FilesystemAdapter $storage */
        $storage = $this->getDisk();

        if (! $storage->exists($state->filename)) {
            return null;
        }

        if ($this->getVisibility() === 'private' || $storage->getVisibility($state->filename) === 'private') {
            try {
                return $storage->temporaryUrl(
                    $state->filename,
                    now()->addMinutes(5),
                );
            } catch (Throwable $exception) {
                // This driver does not support creating temporary URLs.
            }
        }

        return $state->thumbnail_url;
    }

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
