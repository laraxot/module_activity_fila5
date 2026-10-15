<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Fixtures;

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Models\BaseModel;

/**
 * Test model that simulates a record whose update() method throws an exception
 * Used to test RestoreActivityAction's exception handling
 */
final class RestoreActivityFailingUpdateModel extends BaseModel
{
    public function update(array $attributes = [], array $options = [])
    {
        throw new \Exception('Simulated update failure');
    }

    /** @var string */
    protected $table = 'activity_failing_updates';

    /** @var list<string> */
    protected $fillable = ['name'];
}
