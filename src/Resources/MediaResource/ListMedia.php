<?php

namespace Awcodes\Curator\Resources\MediaResource;

use Awcodes\Curator\Facades\Curator;
use Awcodes\Curator\Resources\MediaResource;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Session;

class ListMedia extends ListRecords
{
    protected static string $resource = MediaResource::class;

    protected function getActions(): array
    {
        return array_merge(
            [
                Action::make('toggle-table-view')
                    ->disableLabel()
                    ->color('secondary')
                    ->icon(function () {
                        $condition = app('curator')->shouldTableHaveGridLayout();
                        if (Session::has('tableLayout')) {
                            $condition = Session::get('tableLayout');
                        }

                        return $condition ? 'heroicon-s-view-list' : 'heroicon-s-view-grid';
                    })
                    ->action(function(): void {
                        if (! Session::has('tableLayout')) {
                            Session::put('tableLayout', ! app('curator')->shouldTableHaveGridLayout());
                        } else {
                            $condition = Session::get('tableLayout');
                            Session::put('tableLayout', ! $condition);
                        }
                    }),
            ],
            parent::getActions(),
        );
    }

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
