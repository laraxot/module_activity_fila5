<?php

declare(strict_types=1);

namespace Modules\Activity\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Modules\Activity\Database\Factories\SnapshotFactory;
use Modules\Xot\Models\Traits\HasXotFactory;
use Spatie\EventSourcing\Snapshots\EloquentSnapshot as SpatieSnapshot;

class Snapshot extends SpatieSnapshot
{
    /** @phpstan-use HasXotFactory<\Modules\Activity\Database\Factories\SnapshotFactory, Snapshot> */
    use HasXotFactory;

    /** @laravel/Modules/UI/docs/bugfix-awstest-undefined-variable.md string */
    protected $connection = 'activity';

    protected $table = 'snapshots';

    public function getConnectionName()
    {
        if (app()->environment('testing')) {
            $default = config('database.default');

            return is_string($default) ? $default : 'mysql';
        }

        $connection = $this->connection;
        if ($connection instanceof \BackedEnum) {
            return (string) $connection->value;
        }
        if ($connection instanceof \UnitEnum) {
            return $connection->name;
        }

        return $connection;
    }

    /** @var list<string> */
    protected $fillable = ['id', 'aggregate_uuid', 'aggregate_version', 'state', 'created_at', 'updated_at'];
}
