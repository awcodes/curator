<?php

namespace Awcodes\Curator\Resources\MediaResource;

use Awcodes\Curator\Facades\Curator;
use Awcodes\Curator\Resources\MediaResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListMedia extends ListRecords
{
    protected static string $resource = MediaResource::class;

    protected function getDefaultTableSortColumn(): ?string
    {
        return 'created_at';
    }

    protected function getDefaultTableSortDirection(): ?string
    {
        return 'desc';
    }

    protected function getTableContentGrid(): ?array
    {
        if (app('curator')->shouldTableHaveGridLayout()) {
            return [
                'md' => 2,
                'lg' => 3,
            ];
        }

        return null;
    }
}
