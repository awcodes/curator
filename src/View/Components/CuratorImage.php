<?php

namespace Awcodes\Curator\View\Components;

use Awcodes\Curator\Models\Media;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CuratorImage extends Component
{
    public string|Media|null $media;

    public function __construct(int $mediaId)
    {
        $this->media = Media::where('id', $mediaId)->first();
    }

    public function render(): View|Closure|string
    {
        return view('curator::components.curator-image', ['media' => $this->media]);
    }
}
