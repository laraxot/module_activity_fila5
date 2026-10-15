<?php

declare(strict_types=1);

namespace Tests\Modules\Activity\Fixtures;

final class ListLogActivitiesNonSchemaFormPage extends ListLogActivitiesPageHarness
{
    public static function getResource(): string
    {
        return ListLogActivitiesNonSchemaFormResource::class;
    }
}
