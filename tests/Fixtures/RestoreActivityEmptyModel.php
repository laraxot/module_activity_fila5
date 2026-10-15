<?php

declare(strict_types=1);

namespace Tests\Modules\Activity\Fixtures;

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Models\BaseModel;

/**
 * Test model that represents an empty record with no fillable properties
 * Used to test RestoreActivityAction's validation of empty oldProperties
 */
final class RestoreActivityEmptyModel extends BaseModel
{
    /** @var string */
    protected $table = 'activity_empty';

    /** @var list<string> */
    protected $fillable = [];
}
