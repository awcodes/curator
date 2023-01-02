<?php

namespace Awcodes\Curator\View\Components;

use Awcodes\Curator\Models\Media;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Glider extends Component
{
    public string $source;

    public function __construct(
        public int|Media $media,
        public string|null $glide = null,
        public string $loading = 'lazy',
        public string|null $background = null,
        public string|null $blur = null,
        public string|null $border = null,
        public string|null $brightness = null,
        public string|null $contrast = null,
        public string|null $crop = null,
        public string|null $devicePixelRatio = null,
        public string|null $filter = null,
        public string|null $fit = null,
        public string|null $flip = null,
        public string|null $format = null,
        public string|null $gamma = null,
        public string|null $height = null,
        public string|null $quality = null,
        public string|null $orientation = null,
        public string|null $pixelate = null,
        public string|null $sharpen = null,
        public string|null $width = null,
        public string|null $watermarkPath = null,
        public string|null $watermarkWidth = null,
        public string|null $watermarkHeight = null,
        public string|null $watermarkXOffset = null,
        public string|null $watermarkYOffset = null,
        public string|null $watermarkPadding = null,
        public string|null $watermarkPosition = null,
        public string|null $watermarkAlpha = null,
    ) {
        if (! $media instanceof Media) {
            $this->media = Media::where('id', $media)->first();
        }
    }

    public function buildGlideSource(): string
    {
        $params = array_filter([
            'bg' => $this->background,
            'blur' => $this->blur,
            'border' => $this->border,
            'bri' => $this->brightness,
            'con' => $this->contrast,
            'crop' => $this->crop,
            'dpr' => $this->devicePixelRatio,
            'filt' => $this->filter,
            'fit' => $this->fit,
            'flip' => $this->flip,
            'fm' => $this->format,
            'gam' => $this->gamma,
            'h' => $this->height,
            'q' => $this->quality,
            'or' => $this->orientation,
            'pixel' => $this->pixelate,
            'sharp' => $this->sharpen,
            'w' => $this->width,
            'mark' => $this->watermarkPath,
            'markw' => $this->watermarkWidth,
            'markh' => $this->watermarkHeight,
            'markx' => $this->watermarkXOffset,
            'marky' => $this->watermarkYOffset,
            'markpad' => $this->watermarkPadding,
            'markpos' => $this->watermarkPosition,
            'markalpha' => $this->watermarkAlpha,
        ]);

        return '/curator/' . $this->media->path . '?' . http_build_query($params);
    }

    public function render(): View|Closure|string
    {
        if ($this->glide) {
            $this->source = '/curator/'.$this->media->path.'?'.$this->glide;
        } else {
            $this->source = $this->buildGlideSource();
        }

        return view('curator::components.glider', [
            'media' => $this->media,
            'source' => $this->source,
            'loading' => $this->loading,
        ]);
    }
}
