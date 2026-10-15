<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Fixtures;

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Models\BaseModel;

/**
 * Test model that simulates a record with updatedAttributes property
 * Used to test RestoreActivityAction's ability to update records
 */
final class RestoreActivityRecordingModel extends BaseModel
{
    /** @var array<string, mixed> */
    public $updatedAttributes = [];

    /** @var string */
    protected $table = 'activity_recordings';

    /** @var list<string> */
    protected $fillable = ['name', 'status'];
}
