<?php

declare(strict_types=1);

namespace Modules\Activity\Models;

use Modules\Activity\Database\Factories\StoredEventFactory;
use Modules\Xot\Models\Traits\HasXotFactory;
use Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEvent as SpatieStoredEvent;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

// @see Modules/Xot/docs/spatie-schemaless-attributes.md
/**
 * @property int                             $id
 * @property string|null                     $aggregate_uuid
 * @property int|null                        $aggregate_version
 * @property int                             $event_version
 * @property string                          $event_class
 * @property array<array-key, mixed>         $event_properties
 * @property \Spatie\SchemalessAttributes\SchemalessAttributes $meta_data
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property string|null                     $updated_by
 * @property string|null                     $created_by
 */
class StoredEvent extends SpatieStoredEvent
{/**
 * @phpstan-use HasXotFactory<\Modules\Activity\Database\Factories\StoredEventFactory>
 */
use HasXotFactory;

    /** @laravel/Modules/UI/docs/bugfix-awstest-undefined-variable.md string */
    protected $connection = 'activity';

    protected $table = 'stored_events';

    protected $fillable = [
        'id',
        'aggregate_uuid',
        'aggregate_version',
        'event_version',
        'event_class',
        'event_properties',
        'meta_data',
        'created_at',
        'updated_by',
        'created_by',
    ];

    protected function casts(): array
    {
        return [
            'event_properties' => 'array',
            'meta_data' => SchemalessAttributes::class,
        ];
    }
}
