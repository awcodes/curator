<?php

namespace Awcodes\Curator\Components\Modals;

use Awcodes\Curator\Models\Curation;
use Awcodes\Curator\Models\Media;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use Livewire\Component;

class CuratorCuration extends Component
{
    public string $statePath;

    public string $modalId;

    public Media $media;

    public Curation|null $record;

    public array|null $presets;

    public function saveCuration($data = null): void
    {
        $image = Image::make(Storage::disk($this->media->disk)->path($this->media->path));

        $aspectWidth = (int) ($data['canvasData']['width'] / $data['canvasData']['naturalWidth']) * $data['width'];
        $aspectHeight = (int) ($data['canvasData']['height'] / $data['canvasData']['naturalHeight']) * $data['height'];

        $image->rotate($data['rotate'])
            ->crop($data['width'], $data['height'], $data['x'], $data['y'])
            ->resize($aspectWidth, $aspectHeight)
            ->encode($data['format'] ?? 'jpg', $data['quality'] ?? 60);

        // save image to directory base on media
        $curationPath = $this->media->directory . '/' . $this->media->name . '/' . $data['key'] . '.' . $image->extension;

        Storage::disk($this->media->disk)->put($curationPath, $image->stream());

        $curation = Curation::create([
            'media_id' => $this->media->id,
            'key' => $data['key'] ?? $aspectWidth . 'x' . $aspectHeight,
            'disk' => $this->media->disk,
            'directory' => $this->media->name,
            'name' => $data['key'] . '.' . $image->extension,
            'path' => $curationPath,
            'width' => $aspectWidth,
            'height' => $aspectHeight,
            'size' => $image->filesize(),
            'type' => $image->mime(),
            'ext' => $image->extension,
        ]);

        $this->dispatchBrowserEvent('add-curation', ['curation' => $curation, 'statePath' => $this->statePath]);
    }

    public function render(): View
    {
        return view('curator::components.modals.curator-curation');
    }
}
