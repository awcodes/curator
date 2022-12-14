<?php

namespace Awcodes\Curator;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class CuratorServiceProvider extends PluginServiceProvider
{
    public static string $name = 'curator';

    protected array $resources = [
        // CustomResource::class,
    ];

    protected array $pages = [
        // CustomPage::class,
    ];

    protected array $widgets = [
        // CustomWidget::class,
    ];

    protected array $styles = [
        'plugin-curator' => __DIR__.'/../resources/dist/curator.css',
    ];

    protected array $scripts = [
        'plugin-curator' => __DIR__.'/../resources/dist/curator.js',
    ];

    // protected array $beforeCoreScripts = [
    //     'plugin-curator' => __DIR__ . '/../resources/dist/curator.js',
    // ];

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name);
    }
}
