<?php

namespace Awcodes\Curator\View\Components;

use Closure;
use Illuminate\View\Component;
use Awcodes\Curator\Models\Media;
use Illuminate\Contracts\View\View;

class CuratorImage extends Component
{
    public string | Media | null $media;

    public string $source;

    public string | null $glide = null;

    public function __construct(int $mediaId, string $glide = null)
    {
        $this->media = Media::where('id', $mediaId)->first();

        $this->source = $this->media->url;

        if ($glide) {
            $this->source = '/curator/' . $this->media->path . '?' . $glide;
        }
    }

    public function render(): View|Closure|string
    {
        return view('curator::components.curator-image', ['media' => $this->media]);
    }
}
