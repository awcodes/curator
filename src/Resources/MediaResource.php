<?php

namespace Awcodes\Curator\Resources;

use Awcodes\Curator\Components\CuratorColumn;
use Awcodes\Curator\Components\Uploader;
use Awcodes\Curator\Models\Media;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Support\HtmlString;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    public static function getModelLabel(): string
    {
        return app('curator')->getResourceLabel();
    }

    protected static function getNavigationIcon(): string
    {
        return app('curator')->getNavigationIcon();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make(__('curator::forms.sections.file'))
                            ->hiddenOn('edit')
                            ->schema([
                                Uploader::make('filename')
                                    ->preserveFilenames(config('curator.preserve_file_names', false))
                                    ->disableLabel()
                                    ->maxWidth(5000)
                                    ->acceptedFileTypes(config('curator.accepted_file_types', []))
                                    ->disk(config('curator.disk', 'public'))
                                    ->required()
                                    ->maxFiles(1)
                                    ->panelAspectRatio('24:9'),
                            ]),
                        Forms\Components\Section::make(__('curator::forms.sections.preview'))
                            ->hiddenOn('create')
                            ->schema([
                                Forms\Components\ViewField::make('preview')
                                    ->view('curator::components.preview')
                                    ->disableLabel()
                                    ->dehydrated(false)
                                    ->afterStateHydrated(function ($component, $state, $record) {
                                        $component->state($record);
                                    }),
                            ]),
                        Forms\Components\Section::make(__('curator::forms.sections.details'))
                            ->schema([
                                Forms\Components\ViewField::make('details')
                                    ->view('curator::components.details')
                                    ->disableLabel()
                                    ->dehydrated(false)
                                    ->columnSpan('full')
                                    ->afterStateHydrated(function ($component, $state, $record) {
                                        $component->state($record);
                                    }),
                            ]),
                    ])
                    ->columnSpan([
                        'lg' => 'full',
                        'xl' => 2,
                    ]),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make(__('curator::forms.sections.meta'))
                            ->schema(
                                static::getAdditionalInformationFormSchema()
                            ),
                    ])->columnSpan([
                        'lg' => 'full',
                        'xl' => 1,
                    ]),
            ])->columns([
                'lg' => 3,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(array_merge(
                static::getDefaultTableColumns(),
            ))
            ->filters([

            ])
            ->actions([
                app('curator')->getTableActionType() == 'icon' ? Tables\Actions\EditAction::make()->iconButton() : Tables\Actions\EditAction::make(),
                app('curator')->getTableActionType() == 'icon' ? Tables\Actions\DeleteAction::make()->iconButton() : Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => MediaResource\ListMedia::route('/'),
            'create' => MediaResource\CreateMedia::route('/create'),
            'edit' => MediaResource\EditMedia::route('/{record}/edit'),
        ];
    }

    public static function getDefaultTableColumns(): array
    {
        return [
            CuratorColumn::make('url')
                ->label(__('curator::tables.columns.url'))
                ->size(40),
            Tables\Columns\TextColumn::make('filename')
                ->label(__('curator::tables.columns.filename'))
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('ext')
                ->label(__('curator::tables.columns.ext'))
                ->sortable(),
            Tables\Columns\IconColumn::make('disk')
                ->label(__('curator::tables.columns.disk'))
                ->options([
                    'heroicon-o-server',
                    'heroicon-o-cloud' => fn ($state): bool => in_array($state, app('curator')->getCloudDisks()),
                ])
                ->colors([
                    'secondary',
                    'success' => fn ($state): bool => in_array($state, app('curator')->getCloudDisks()),
                ]),
            Tables\Columns\TextColumn::make('directory')
                ->label(__('curator::tables.columns.directory'))
                ->sortable(),
        ];
    }

    public static function getAdditionalInformationFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('alt')
                ->label(__('curator::forms.fields.alt'))
                ->hint(fn (): HtmlString => new HtmlString('<a href="https://www.w3.org/WAI/tutorials/images/decision-tree" class="filament-link" target="_blank">'.__('curator::forms.fields.alt_hint').'</a>')),
            Forms\Components\TextInput::make('title')
                ->label(__('curator::forms.fields.title')),
            Forms\Components\Textarea::make('caption')
                ->label(__('curator::forms.fields.caption'))
                ->rows(2),
            Forms\Components\Textarea::make('description')
                ->label(__('curator::forms.fields.description'))
                ->rows(2),
        ];
    }
}
