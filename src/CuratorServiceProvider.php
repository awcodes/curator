<?php

namespace Awcodes\Curator;

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
            ->hasViews()
            ->hasTranslations()
            ->hasMigration('create_media_table')
            ->hasCommands($this->getCommands())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
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

        Livewire::component('curator', Components\Curator::class);

        Blade::component('curator-image', View\Components\CuratorImage::class);
    }

    protected function getResources(): array
    {
        return [
            Resources\MediaResource::class,
        ];
    }

    protected function getCommands(): array
    {
        return [
            // Commands\RegenerateThumbnails::class
        ];
    }

    protected function getStyles(): array
    {
        return [
            'plugin-curator' => __DIR__.'/../resources/dist/curator.css',
        ];
    }

    protected function getScripts(): array
    {
        return [
            //            'plugin-curator' => __DIR__ . '/../resources/dist/curator.js',
        ];
    }
}
