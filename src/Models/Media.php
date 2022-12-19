<?php

namespace Awcodes\Curator\Models;

use Awcodes\Curator\Concerns\HasPackageFactory;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
=======
use Awcodes\Curator\Facades\Curator;
>>>>>>> 1babe7e092fc72938163a76dd44b9c5a2b90a808
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use stdClass;

class Media extends Model
{
    use HasPackageFactory;

    protected static function booted()
    {
        static::creating(function (Media $media) {
            if (is_array($media->filename) || $media->filename instanceof stdClass) {
                foreach ($media->filename as $k => $v) {
                    $media->{$k} = $v;
                }
            }
        });

        static::deleted(function (Media $media) {
            Storage::disk($media->disk)->delete($media->path);

            if (count(Storage::disk($media->disk)->allFiles($media->directory)) == 0) {
                Storage::disk($media->disk)->deleteDirectory($media->directory);
            }
        });
    }

    protected $guarded = [];

    protected $casts = [
        'width' => 'integer',
        'height' => 'integer',
        'size' => 'integer',
    ];

    protected $appends= [
        'thumbnail_url'
    ];

    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn () => Storage::disk($this->disk)->url($this->directory.'/'.$this->filename),
        );
    }

    protected function thumbnailUrl(): Attribute
    {
        $filename = $this->directory . '/' . Str::of($this->filename)->beforeLast('.') . '-thumbnail.webp';
        return Attribute::make(
            get: fn () => Storage::disk($this->disk)->url($filename),
        );
    }

    protected function fullPath(): Attribute
    {
        return Attribute::make(
            get: fn () => Storage::disk($this->disk)->path($this->directory.'/'.$this->filename),
        );
    }

    protected function sizeForHumans(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->getSizeForHumans()
        );
    }

    public function getSizeForHumans(int $precision = 1): string
    {
        $units = ['B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB'];
        $size = $this->size;
        for ($i = 0; $size > 1024; $i++) {
            $size /= 1024;
        }

        return round($size, $precision).' '.$units[$i];
    }
}
