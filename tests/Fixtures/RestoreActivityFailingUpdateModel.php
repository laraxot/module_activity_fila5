<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Fixtures;

<<<<<<< .merge_file_CvyQ8E
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
=======
use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * Modello finto la cui update() fallisce sempre (classe con nome, non anonima).
 */
final class RestoreActivityFailingUpdateModel extends Model
{
    protected $table = 'stub_models';

    /**
     * @param  array<string, mixed>  $attributes
     */
    public function update(array $attributes = [], array $options = []): bool
    {
        throw new Exception('db error');
    }
>>>>>>> .merge_file_B8Px4w
}
