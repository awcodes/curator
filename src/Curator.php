<?php

namespace Awcodes\Curator;

use Closure;
use Filament\Support\Concerns\EvaluatesClosures;

class Curator
{
    use EvaluatesClosures;

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

    public function getCloudDisks(): array
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

    public function isResizable(string $ext): bool
    {
        return in_array($ext, ['jpeg', 'jpg', 'png', 'webp', 'bmp']);
    }
}
