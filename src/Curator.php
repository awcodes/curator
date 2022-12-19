<?php

namespace Awcodes\Curator;

use Closure;
use Filament\Support\Concerns\EvaluatesClosures;

class Curator
{
    use EvaluatesClosures;

    protected string | Closure $resourceLabel = 'Media';

    protected string $navigationIcon = 'heroicon-o-photograph';

    protected string $tableActionType = 'link';

    protected bool | Closure $shouldPreserveFilenames = false;

    protected array | Closure $acceptedFileTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml', 'application/pdf'];

    protected int | Closure $maxWidth = 2000;

    protected int | Closure $minSize = 0;

    protected int | Closure $maxSize = 5000;

    protected string | Closure $diskName = 'public';

    protected string | Closure $directory = 'media';

    protected string | Closure $visibility = 'public';

    protected array $cloudDisks = ['s3', 'cloudinary', 'imgix'];

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

    public function tableActionType(string $actionType): static
    {
        $this->tableActionType = $actionType;

        return $this;
    }

    public function preserveFilenames(bool | Closure $condition = true): static
    {
        $this->shouldPreserveFilenames = $condition;

        return $this;
    }

    public function acceptedFileTypes(array | Closure $types): static
    {
        $this->acceptedFileTypes = $types;

        return $this;
    }

    public function maxWidth(int | Closure $width): static
    {
        $this->maxWidth = $width;

        return $this;
    }

    public function minSize(int | Closure $size): static
    {
        $this->minSize = $size;

        return $this;
    }

    public function maxSize(int | Closure $size): static
    {
        $this->maxSize = $size;

        return $this;
    }

    public function disk(string | Closure $disk): static
    {
        $this->diskName = $disk;

        return $this;
    }

    public function directory(string | Closure $directory): static
    {
        $this->directory = $directory;

        return $this;
    }

    public function visibility(string | Closure $visibility): static
    {
        $this->visibility = $visibility;

        return $this;
    }

    public function cloudDisks(array $disks): static
    {
        $this->cloudDisks = $disks;

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

    public function getTableActionType(): string
    {
        if (! in_array($this->tableActionType, ['icon', 'link'])) {
            return 'link';
        }

        return $this->tableActionType;
    }

    public function shouldPreserveFilenames(): bool
    {
        return $this->evaluate($this->shouldPreserveFilenames);
    }

    public function getAcceptedFileTypes(): array
    {
        return $this->evaluate($this->acceptedFileTypes);
    }

    public function getMaxWidth(): int
    {
        return $this->evaluate($this->maxWidth);
    }

    public function getMinSize(): int
    {
        return $this->evaluate($this->minSize);
    }

    public function getMaxSize(): int
    {
        return $this->evaluate($this->maxSize);
    }

    public function getDiskName(): string
    {
        return $this->evaluate($this->diskName);
    }

    public function getDirectory(): string
    {
        return $this->evaluate($this->directory);
    }

    public function getVisibility(): string
    {
        return $this->evaluate($this->visibility);
    }

    public function getCloudDisks(): array
    {
        return $this->cloudDisks;
    }

    private function getPathInfo(string $filename): array
    {
        return pathinfo($filename);
    }

    public function isResizable(string $ext): bool
    {
        return in_array($ext, ['jpeg', 'jpg', 'png', 'webp', 'bmp']);
    }
}
