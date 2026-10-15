<?php

declare(strict_types=1);

namespace Tests\Modules\Activity\Fixtures;

use Illuminate\Database\Eloquent\Model;

/**
 * Subject senza relazione activities valida (per branch errori).
 */
final class ActivitySubjectWithoutRelationHarness extends Model
{
    protected $table = 'activity_subject_no_rel';

    public $timestamps = false;

    public function activities(): string
    {
        return 'not-a-relation';
    }
}
