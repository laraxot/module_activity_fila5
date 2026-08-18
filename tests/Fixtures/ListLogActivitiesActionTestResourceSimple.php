<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Fixtures;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Xot\Filament\Resources\XotBaseResource;

final class ListLogActivitiesActionTestResourceSimple extends XotBaseResource
{
    public static function getFormSchema(): array
    {
        return [];
    }

    /**
     * @param  array<string, mixed>  $parameters
     */
    public static function getUrl(?string $name = null, array $parameters = [], bool $isAbsolute = true, ?string $panel = null, ?Model $tenant = null, bool $shouldGuessMissingParameters = false, ?string $configuration = null): string
=======
=======
>>>>>>> 35d8cf69 (Initial commit)

final class ListLogActivitiesActionTestResourceSimple
{
    /**
     * @param  array  $parameters
     */
    public static function getUrl(string $name, array $parameters = []): string
<<<<<<< HEAD
>>>>>>> 0a02158a (.)
=======
>>>>>>> 35d8cf69 (Initial commit)
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
