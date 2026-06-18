<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Fixtures;

use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Model;

final class ListLogActivitiesActionTestRecord extends Model
{
    /** @var string */
    protected $table = 'test_records';

    public $timestamps = false;

    protected $keyType = 'string';

    public $incrementing = false;

    /** @var array<string, string> */
    protected $attributes = [
        'id' => 'test-record-key',
    ];
}

final class ListLogActivitiesActionTestResource
{
    /**
     * @param  array<string, mixed>  $parameters
     */
    public static function getUrl(string $name, array $parameters = []): string
    {
        $record = $parameters['record'] ?? null;
        $key = $record instanceof Model ? (string) $record->getKey() : '';

        return '/log-activity/'.$name.'/'.$key;
    }
}

final class ListLogActivitiesActionTestResourceSimple
{
    /**
     * @param  array<string, mixed>  $parameters
     */
    public static function getUrl(string $name, array $parameters = []): string
    {
        $record = $parameters['record'] ?? null;
        $key = $record instanceof Model ? (string) $record->getKey() : '';

        return '/log-activity/'.$key;
    }
}

final class ListLogActivitiesActionTestPage extends ListRecords
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
