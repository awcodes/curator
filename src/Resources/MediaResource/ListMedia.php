<?php

namespace Awcodes\Curator\Resources\MediaResource;

use Awcodes\Curator\Facades\Curator;
use Awcodes\Curator\Resources\MediaResource;
use Filament\Resources\Pages\ListRecords;

class ListMedia extends ListRecords
{
    protected static string $resource = MediaResource::class;

    protected function getTableContentGrid(): ?array
    {
        if (app('curator')->getTableLayout() === 'grid') {
            return [
                'md' => 2,
                'xl' => 3,
            ];
        }

        return null;
    }
}
