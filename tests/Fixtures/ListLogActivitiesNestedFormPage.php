<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Fixtures;

use Illuminate\Database\Eloquent\Model;

final class ListLogActivitiesNestedFormPage extends ListLogActivitiesPageHarness
{
    public static function getResource(): string
    {
        return ListLogActivitiesNestedFormResource::class;
    }
}
