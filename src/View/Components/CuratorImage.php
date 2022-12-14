<?php

namespace Awcodes\Curator\View\Components;

use Closure;
use Illuminate\View\Component;
use Awcodes\Curator\Models\Media;
use Illuminate\Contracts\View\View;

class CuratorImage extends Component
{
    public string | Media | null $media;

    public function __construct(int $mediaId)
    {
        $this->media = Media::where('id', $mediaId)->first();
    }

    public function render(): View|Closure|string
    {
        return view('curator::components.curator-image', ['media' => $this->media]);
    }
}
