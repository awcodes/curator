<?php

namespace Awcodes\Curator;

use Awcodes\Curator\Models\Media;
use Awcodes\Curator\Observers\MediaObserver;
use Filament\PluginServiceProvider;
use Illuminate\Support\Facades\Blade;
use Livewire\Livewire;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;

class CuratorServiceProvider extends PluginServiceProvider
{
    public static string $name = 'curator';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasRoute('web')
            ->hasViews()
            ->hasTranslations()
            ->hasMigration('create_media_table')
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishMigrations()
                    ->askToRunMigrations();
            });
    }

    public function packageRegistered(): void
    {
        parent::packageRegistered();

        $this->app->singleton('curator', fn (): Curator => new Curator());
    }

    public function packageBooted(): void
    {
        parent::packageBooted();

        Media::observe(MediaObserver::class);

        Livewire::component('curator', Components\Curator::class);

        Blade::component('curator-image', View\Components\CuratorImage::class);
    }

    protected function getResources(): array
    {
        return [
            Resources\MediaResource::class,
        ];
    }

    protected function getStyles(): array
    {
        return [
            'plugin-curator' => __DIR__.'/../resources/dist/curator.css',
        ];
    }
}
