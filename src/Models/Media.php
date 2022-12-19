<?php

namespace Awcodes\Curator\Models;

use Awcodes\Curator\Concerns\HasPackageFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Storage;
use stdClass;

class Media extends Model
{
    use HasPackageFactory;

    protected static function booted()
    {
        static::creating(function (Media $media) {
            if (is_array($media->file) || $media->file instanceof stdClass) {
                foreach ($media->file as $k => $v) {
                    if ($k === 'name') {
                        $media->{$k} = $v->toString();
                    } else {
                        $media->{$k} = $v;
                    }
                }

                $media->__unset('file');
            }
        });

        static::updating(function (Media $media) {
            if ($media->isDirty(['name']) && ! blank($media->name)) {
                if (Storage::disk($media->disk)->exists($media->directory . '/' . $media->name . '.' . $media->ext)) {
                    $media->name = $media->name . '-' . time();
                }
                Storage::disk($media->disk)->move($media->path, $media->directory . '/' . $media->name . '.' . $media->ext);
                $media->path = $media->directory . '/' . $media->name . '.' . $media->ext;
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
            get: fn () => Storage::disk($this->disk)->url($this->directory . '/' . $this->name . '.' . $this->ext),
        );
    }

    protected function thumbnailUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => '/curator/' . $this->path. '?w=200&h=200&fit=crop&fm=webp',
        );
    }

    protected function fullPath(): Attribute
    {
        return Attribute::make(
            get: fn () => Storage::disk($this->disk)->path($this->directory . '/' . $this->name. '.' . $this->ext),
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

        return round($size, $precision) . ' ' . $units[$i];
    }
}
