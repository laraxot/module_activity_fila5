<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Fixtures;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD

final class ListLogActivitiesActionTestResourceSimple
=======
use Modules\Xot\Filament\Resources\XotBaseResource;

final class ListLogActivitiesActionTestResourceSimple extends XotBaseResource
>>>>>>> laraxot/dev
{
    /**
     * @param  array<string, mixed>  $parameters
     */
<<<<<<< HEAD
    public static function getUrl(string $name, array $parameters = []): string
=======
    public static function getUrl(?string $name = null, array $parameters = [], bool $isAbsolute = true, ?string $panel = null, ?Model $tenant = null, bool $shouldGuessMissingParameters = false, ?string $configuration = null): string
>>>>>>> laraxot/dev
    {
        $record = $parameters['record'] ?? null;
        $key = '';
        if ($record instanceof Model) {
            $modelKey = $record->getKey();
            $key = is_scalar($modelKey) ? (string) $modelKey : '';
        }

        return '/log-activity/'.$key;
    }
}
