<?php

declare(strict_types=1);

namespace Modules\Activity\Models;

use Modules\Activity\Database\Factories\SnapshotFactory;
use Modules\Xot\Models\Traits\HasXotFactory;
use Spatie\EventSourcing\Snapshots\EloquentSnapshot as SpatieSnapshot;

/**
 * Modules\Activity\Models\Snapshot.
 *
 * @property int $id
 * @property string $aggregate_uuid
 * @property int $aggregate_version
 * @property array<array-key, mixed> $state
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $updated_by
 * @property string|null $created_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Snapshot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Snapshot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Snapshot query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Snapshot uuid(string $uuid)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Snapshot whereAggregateUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Snapshot whereAggregateVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Snapshot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Snapshot whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Snapshot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Snapshot whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Snapshot whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Snapshot whereUpdatedBy($value)
 * @method static SnapshotFactory factory($count = null, $state = [])
 *
 * @mixin \Eloquent
 */
class Snapshot extends SpatieSnapshot
{/**
 * @phpstan-use HasXotFactory<\Modules\Activity\Database\Factories\SnapshotFactory>
 */
use HasXotFactory;

    /** @laravel/Modules/UI/docs/bugfix-awstest-undefined-variable.md string */
    protected $connection = 'activity';

    /** @var list<string> */
    protected $fillable = ['id', 'aggregate_uuid', 'aggregate_version', 'state', 'created_at', 'updated_at'];
}
