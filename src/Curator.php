<?php

namespace Awcodes\Curator;

use Awcodes\Curator\Concerns\CanNormalizePaths;
use Awcodes\Curator\Config\PathGenerator\PathGenerator;
use Closure;
use Filament\Support\Concerns\EvaluatesClosures;

class Curator
{
    use EvaluatesClosures;
    use CanNormalizePaths;

    protected string|Closure $resourceLabel = 'Media';

    protected string $navigationIcon = 'heroicon-o-photograph';

    protected bool | Closure | null $tableHasIconActions = false;

    protected bool | Closure | null $tableHasGridLayout = true;

    protected bool|Closure $shouldPreserveFilenames = false;

    protected array|Closure $acceptedFileTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml', 'application/pdf'];

    protected int|Closure $maxWidth = 2000;

    protected int|Closure $minSize = 0;

    protected int|Closure $maxSize = 5000;

    protected string|Closure $diskName = 'public';

    protected string|Closure $directory = 'media';

    protected string|Closure $visibility = 'public';

    protected array $cloudDisks = ['s3', 'cloudinary', 'imgix'];

    public function resourceLabel(string|Closure $label): static
    {
        $this->resourceLabel = $label;

        return $this;
    }

    public function navigationIcon(string $icon): static
    {
        $this->navigationIcon = $icon;

        return $this;
    }

    public function tableHasIconActions(bool|Closure|null $condition = false): static
    {
        $this->tableHasIconActions = $condition;

        return $this;
    }

    public function tableHasGridLayout(bool|Closure|null $condition = true): static
    {
        $this->tableHasGridLayout = $condition;

        return $this;
    }

    public function preserveFilenames(bool|Closure $condition = true): static
    {
        $this->shouldPreserveFilenames = $condition;

        return $this;
    }

    public function acceptedFileTypes(array|Closure $types): static
    {
        $this->acceptedFileTypes = $types;

        return $this;
    }

    public function maxWidth(int|Closure $width): static
    {
        $this->maxWidth = $width;

        return $this;
    }

    public function minSize(int|Closure $size): static
    {
        $this->minSize = $size;

        return $this;
    }

    public function maxSize(int|Closure $size): static
    {
        $this->maxSize = $size;

        return $this;
    }

    public function disk(string|Closure $disk): static
    {
        $this->diskName = $disk;

        return $this;
    }

    public function directory(Closure|PathGenerator|string|null $directory): static
    {
        if (
            class_exists($directory) &&
            is_subclass_of($directory, PathGenerator::class)
        ) {
            $path = resolve($directory)->getPath($this->directory);
        } else {
            $path = $directory ?? $this->directory;
        }

        $this->directory = $this->normalizePath($path);

        return $this;
    }

    public function visibility(string|Closure $visibility): static
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

    public function shouldTableHaveIconActions(): string
    {
        return $this->tableHasIconActions;
    }

    public function shouldTableHaveGridLayout(): string
    {
        return $this->tableHasGridLayout;
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
