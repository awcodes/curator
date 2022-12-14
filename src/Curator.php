<?php

namespace Awcodes\Curator;

use Closure;
use Filament\Support\Concerns\EvaluatesClosures;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Curator
{
    use EvaluatesClosures;

    protected array $defaultSizes = [
        'thumbnail' => ['width' => 200, 'height' => 200, 'quality' => 60],
    ];

    protected string | Closure $resourceLabel = 'Media';

    protected string $navigationIcon = 'heroicon-o-photograph';

    protected array $cloudDisks = ['s3', 'cloudinary', 'imgix'];

    protected string $tableActionType = 'link';

    public function resourceLabel(string | Closure $label): static
    {
        $this->resourceLabel = $label;

        return $this;
    }

    public function navigationIcon(string $icon): static
    {
        $this->navigationIcon = $icon;

        return $this;
    }

    public function cloudDisks(array $disks): static
    {
        $this->cloudDisks = $disks;

        return $this;
    }

    public function tableActionType(string $actionType): static
    {
        $this->tableActionType = $actionType;

        return $this;
    }

    public function getResourceLabel(): string
    {
        return $this->evaluate($this->resourceLabel);
    }

    public function getNavigationIcon(): string
    {
        return $this->navigationIcon;
    }

    public function getCloudDisks(): string
    {
        return $this->cloudDisks;
    }

    public function getTableActionType(): string
    {
        if (! in_array($this->tableActionType, ['icon', 'link'])) {
            return 'link';
        }

        return $this->tableActionType;
    }

    private function getPathInfo(string $filename): array
    {
        return pathinfo($filename);
    }

    public function getSizes(): array
    {
        return Arr::exists(config('filament-curator.sizes'), 'thumbnail')
            ? config('filament-curator.sizes')
            : array_merge($this->defaultSizes, config('filament-curator.sizes'));
    }

    public function hasSizes(string $ext): bool
    {
        return $this->getSizes() && $this->isResizable($ext);
    }

    public function isResizable(string $ext): bool
    {
        return in_array($ext, ['jpeg', 'jpg', 'png', 'webp', 'bmp']);
    }

    public function generateThumbnails(Model | \stdClass $media, bool $usePath = false): void
    {
        if ($this->hasSizes($media->ext)) {
            $path_info = $this->getPathInfo($media->filename);

            foreach ($this->getSizes() as $name => $data) {
                if (in_array($media->disk, config('filament-curator.cloud_disks'))) {
                    $file = Storage::disk($media->disk)->url($media->filename);
                } else {
                    $file = Storage::disk($media->disk)->path($media->filename);
                }

                $image = Image::make($file);

                if ($data['width'] == $data['height']) {
                    $image->fit($data['width']);
                } else {
                    $image->resize($data['width'], $data['height'], function ($constraint) use ($data) {
                        if (! $data['height']) {
                            $constraint->aspectRatio();
                        }
                    });
                }

                $image->encode(null, $data['quality']);

                Storage::disk($media->disk)->put(
                    "{$path_info['dirname']}/{$path_info['filename']}-{$name}.{$media->ext}",
                    $image->stream()
                );
            }
        }
    }

    public function destroyThumbnails(Model | \stdClass $media): void
    {
        if ($this->hasSizes($media->ext)) {
            $path_info = $this->getPathInfo($media->filename);

            $thumbnails = collect(Storage::disk($media->disk)->allFiles())->filter(function ($item) use ($path_info) {
                return Str::startsWith($item, $path_info['dirname'] . '/' . $path_info['filename'] . '-');
            });

            foreach ($thumbnails as $thumbnail) {
                Storage::disk($media->disk)->delete($thumbnail);
            }
        }
    }
}
