<?php

namespace Awcodes\Curator\Components;

use Awcodes\Curator\Actions\DownloadAction;
use Awcodes\Curator\Actions\PickerAction;
use Awcodes\Curator\Config\PathGenerator\PathGenerator;
use Awcodes\Curator\Models\Media;
use Closure;
use Filament\Forms\Components\Field;
use Filament\Support\Actions\Concerns\CanBeOutlined;
use Filament\Support\Actions\Concerns\HasColor;
use Filament\Support\Actions\Concerns\HasSize;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class CuratorPicker extends Field
{
    use HasColor;
    use HasSize;
    use CanBeOutlined;

    protected string $view = 'curator::components.picker';

    protected string | Htmlable | Closure | null $buttonLabel = null;

    protected bool | Closure | null $isConstrained = false;

    protected string | Closure | null $curatorDiskName = 'public';

    protected string | Closure | null $curatorDirectory = 'media';

    protected string | Closure | null $curatorVisibility = 'public';

    protected array | Closure $curatorAcceptedFileTypes = ['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml', 'application/pdf'];

    protected bool | Closure $curatorShouldPreserveFilenames = false;

    protected int | Closure | null $curatorMaxSize = null;

    protected int | Closure | null $curatorMinSize = null;

    protected string | Closure | null $curatorImageCropAspectRatio = null;

    protected string | Closure | null $curatorImageResizeTargetHeight = null;

    protected string | Closure | null $curatorImageResizeTargetWidth = null;

    protected function setUp(): void
    {
        parent::setUp();

        $this->buttonLabel = __('curator::views.picker.button');
        $this->size = 'md';
        $this->color = 'primary';
        $this->isOutlined = true;

//        $this->curatorDiskName = config('filament-curator.disk', 'public');
//        $this->curatorDirectory = config('filament-curator.directory');
//        $this->curatorVisibility = config('filament-curator.visibility', 'public');
//        $this->curatorAcceptedFileTypes = config('filament-curator.accepted_file_types');
//        $this->curatorShouldPreserveFilenames = config('filament-curator.preserve_file_names');
//        $this->curatorMaxWidth = config('filament-curator.max_width');
//        $this->curatorMinSize = config('filament-curator.min_size');
//        $this->curatorMaxSize = config('filament-curator.max_size');
//        $this->rules = config('filament-curator.rules');

        $this->registerActions([
            PickerAction::make(),
            DownloadAction::make(),
        ]);
    }

    public function buttonLabel(string | Htmlable | Closure | null $label): static
    {
        $this->buttonLabel = $label;

        return $this;
    }

    public function constrained(bool | Closure | null $condition = true): static
    {
        $this->isConstrained = $condition;

        return $this;
    }

    public function directory(Closure | PathGenerator | string | null $directory): static
    {
        if (
            class_exists($directory) &&
            is_subclass_of($directory, PathGenerator::class)
        ) {
            $path = resolve($directory)->getPath($this->curatorDirectory);
        } else {
            $path = $directory ?? $this->curatorDirectory;
        }

        // normalization /path//to/dir/ --> path/to/dir
        $path = preg_replace('#/+#', '/', $path);
        if (Str::startsWith($path, '/')) {
            $path = substr($path, 1);
        }
        if (Str::endsWith($path, '/')) {
            $path = substr($path, 0, strlen($path) - 1);
        }

        $this->curatorDirectory = $path;

        return $this;
    }

    public function acceptedFileTypes(array | Arrayable | Closure $types): static
    {
        $this->curatorAcceptedFileTypes = $types;

        return $this;
    }

    public function disk(string | Closure | null $name): static
    {
        $this->curatorDiskName = $name;

        return $this;
    }

    public function maxSize(int | Closure | null $size): static
    {
        $this->curatorMaxSize = $size;

        return $this;
    }

    public function minSize(int | Closure | null $size): static
    {
        $this->curatorMinSize = $size;

        return $this;
    }

    public function imageCropAspectRatio(string | Closure | null $ratio): static
    {
        $this->curatorImageCropAspectRatio = $ratio;

        return $this;
    }

    public function imageResizeTargetHeight(string | Closure | null $height): static
    {
        $this->curatorImageResizeTargetHeight = $height;

        return $this;
    }

    public function imageResizeTargetWidth(string | Closure | null $width): static
    {
        $this->curatorImageResizeTargetWidth = $width;

        return $this;
    }

    public function preserveFilenames(bool | Closure $condition = true): static
    {
        $this->curatorShouldPreserveFilenames = $condition;

        return $this;
    }

    public function getCurrentItem(): Model | Collection | null
    {
        return Media::where('id', $this->getState())->first();
    }

    public function getButtonLabel(): string | Htmlable | null
    {
        return $this->evaluate($this->buttonLabel);
    }

    public function isConstrained(): bool
    {
        return $this->evaluate($this->isConstrained);
    }

    public function getDirectory(): ?string
    {
        return $this->evaluate($this->curatorDirectory);
    }

    public function getDiskName(): string
    {
        return $this->evaluate($this->curatorDiskName) ?? config('forms.default_filesystem_disk');
    }

    public function getMaxSize(): ?int
    {
        return $this->evaluate($this->curatorMaxSize);
    }

    public function getMinSize(): ?int
    {
        return $this->evaluate($this->curatorMinSize);
    }

    public function getVisibility(): string
    {
        return $this->evaluate($this->curatorVisibility);
    }

    public function shouldPreserveFilenames(): bool
    {
        return $this->evaluate($this->curatorShouldPreserveFilenames);
    }

    public function getImageCropAspectRatio(): ?string
    {
        return $this->evaluate($this->curatorImageCropAspectRatio);
    }

    public function getImageResizeTargetHeight(): ?string
    {
        return $this->evaluate($this->curatorImageResizeTargetHeight);
    }

    public function getImageResizeTargetWidth(): ?string
    {
        return $this->evaluate($this->curatorImageResizeTargetWidth);
    }

    public function getAcceptedFileTypes(): ?array
    {
        $types = $this->evaluate($this->curatorAcceptedFileTypes);

        if ($types instanceof Arrayable) {
            $types = $types->toArray();
        }

        return $types;
    }
}