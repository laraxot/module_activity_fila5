<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Fixtures;

use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

final class ListLogActivitiesActionTestPage extends XotBaseListRecords
{
    /** @var class-string */
    private static string $resourceClass = ListLogActivitiesActionTestResource::class;

    /**
     * @param  class-string  $resourceClass
     */
    public static function usingResource(string $resourceClass): self
    {
        self::$resourceClass = $resourceClass;

        return new self;
    }

    public static function getResource(): string
    {
        return self::$resourceClass;
    }
}
