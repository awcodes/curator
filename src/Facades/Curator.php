<?php

namespace Awcodes\Curator\Facades;

use Closure;
use Illuminate\Support\Facades\Facade;

/**
 * @method static resourceLabel(string $label)
 * @method static navigationIcon(string $label)
 * @method static tableHasIconActions(bool | Closure | null $condition)
 * @method static tableHasGridLayout(bool | Closure | null $condition)
 * @method static preserveFilenames(bool | Closure $condition)
 * @method static acceptedFileTypes(array | Closure $types)
 * @method static maxWidth(int | Closure $width)
 * @method static minSize(int | Closure $size)
 * @method static maxSize(int | Closure $size)
 * @method static disk(string | Closure $disk)
 * @method static directory(string | Closure $directory)
 * @method static visibility(string | Closure $visibility)
 * @method static cloudDisks(array $disks)
 * @method static string getResourceLabel()
 * @method static string getNavigationIcon()
 * @method static string shouldTableHaveIconActions()
 * @method static string shouldTableHaveGridLayout()
 * @method static bool shouldPreserveFilenames()
 * @method static array getAcceptedFileTypes()
 * @method static int getMaxWidth()
 * @method static int getMinSize()
 * @method static int getMaxSize()
 * @method static string getDiskName()
 * @method static string getDirectory()
 * @method static string getVisibility()
 * @method static array getCloudDisks()
 * @method static bool isResizable(string $ext)
 *
 * @see \Awcodes\Curator\Curator
 */
class Curator extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'curator';
    }
}
