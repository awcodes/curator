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
            ->hasRoute('web')
            ->hasViews()
            ->hasTranslations()
            ->hasMigration('create_media_table')
<<<<<<< HEAD
            ->hasInstallCommand(function(InstallCommand $command) {
=======
            ->hasCommands($this->getCommands())
            ->hasInstallCommand(function (InstallCommand $command) {
>>>>>>> 1babe7e092fc72938163a76dd44b9c5a2b90a808
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

    protected function getStyles(): array
    {
        return [
            'plugin-curator' => __DIR__.'/../resources/dist/curator.css',
        ];
    }
<<<<<<< HEAD
=======

    protected function getScripts(): array
    {
        return [
            //            'plugin-curator' => __DIR__ . '/../resources/dist/curator.js',
        ];
    }
>>>>>>> 1babe7e092fc72938163a76dd44b9c5a2b90a808
}
