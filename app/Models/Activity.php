<?php

declare(strict_types=1);

namespace Modules\Activity\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Database\Factories\ActivityFactory;
use Modules\Xot\Models\Traits\HasXotFactory;
use Spatie\Activitylog\Models\Activity as SpatieActivity;
use Spatie\SchemalessAttributes\Casts\SchemalessAttributes;

class Activity extends SpatieActivity
{/**
 * @phpstan-use HasXotFactory<\Modules\Activity\Database\Factories\ActivityFactory, Activity>
 */
use HasXotFactory;

    /** @var string */
    protected $connection = 'activity';

    protected $table = 'activity_log';

    /** @var list<string> */
    protected $fillable = [
        'id',
        'log_name',
        'description',
        'subject_type',
        'event',
        'subject_id',
        'causer_type',
        'causer_id',
        'properties',
        'attribute_changes',
        'batch_uuid',
    ];

    protected function casts(): array
    {
        return [
            'properties' => SchemalessAttributes::class,
            'attribute_changes' => 'collection',
        ];
    }

    public function scopeForBatch(Builder $query, string $batchUuid): Builder
    {
        return $query->where('batch_uuid', $batchUuid);
    }

    public function scopeHasBatch(Builder $query): Builder
    {
        return $query->whereNotNull('batch_uuid');
    }

    // NOTE
    // ----
    // We intentionally do not override static query helper methods here
    // (query, whereDate, whereMonth, whereYear, whereBetween, selectRaw,
    // latest, limit, with, count, clone). The underlying
    // Spatie\Activitylog\Models\Activity base model already exposes the
    // appropriate fluent Eloquent API, and PHPStan understands these via
    // the @method annotations declared in this PHPDoc. Keeping only the
    // annotations avoids return.type conflicts while preserving behaviour.
}
