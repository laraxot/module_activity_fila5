<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Fixtures;

use Illuminate\Database\Eloquent\Model;

final class ListLogActivitiesActionTestResource
{
    /**
<<<<<<< HEAD
     * @param  array<string, mixed>  $parameters
=======
     * @param  array  $parameters
>>>>>>> 0a02158a (.)
     */
    public static function getUrl(string $name, array $parameters = []): string
    {
        $record = $parameters['record'] ?? null;
        $key = '';
        if ($record instanceof Model) {
            $modelKey = $record->getKey();
            $key = is_scalar($modelKey) ? (string) $modelKey : '';
        }

        return '/log-activity/'.$name.'/'.$key;
    }
}
