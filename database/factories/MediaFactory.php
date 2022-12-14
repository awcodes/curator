<?php

namespace Awcodes\Curator\Database\Factories;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;

class MediaFactory extends Factory
{
    protected $model = Media::class;

    public function asDocument(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'filename' => 'document.pdf',
                'path' => 'media/document.pdf',
                'type' => 'application/pdf',
                'width' => null,
                'height' => null,
                'size' => 1024,
            ];
        });
    }

    public function vertical(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'filename' => 'vertical.jpg',
                'path' => 'media/vertical.jpg',
            ];
        });
    }

    public function definition(): array
    {
        return [
            'disk' => 'public',
            'directory' => 'media',
            'filename' => 'horizontal.jpg',
            'path' => 'media/horizontal.jpg',
            'width' => 640,
            'height' => 640,
            'size' => 540,
            'type' => 'image',
            'ext' => 'jpg',
            'alt' => $this->faker->words(5, true),
            'title' => $this->faker->words(10, true),
            'description' => $this->faker->words(10, true),
            'caption' => $this->faker->words(10, true),
        ];
    }
}
