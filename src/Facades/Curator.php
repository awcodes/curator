<?php

namespace Awcodes\Curator\Facades;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Facade;

/**
 * @method static resourceLabel(string $label)
 * @method static navigationIcon(string $label)
 * @method static cloudDisks(array $disks)
 * @method static tableActionType(string $actionType)
 * @method static string getResourceLabel()
 * @method static string getNavigationIcon()
 * @method static array getCloudDisks()
 * @method static string getTableActionType()
 * @method static bool hasSizes(string $ext)
 * @method static bool isResizable(string $ext)
 * @method static void generateThumbnails(Model | \stdClass $media, bool $usePath = false)
 * @method static void destroyThumbnails(Model | \stdClass $media)
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
