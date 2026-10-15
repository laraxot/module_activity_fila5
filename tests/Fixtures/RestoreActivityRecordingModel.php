<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Fixtures;

use Illuminate\Database\Eloquent\Model;
<<<<<<< .merge_file_od9Jjz
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
=======

/**
 * Modello finto che registra gli attributi passati a update() (classe con nome, non anonima).
 */
final class RestoreActivityRecordingModel extends Model
{
    protected $table = 'stub_models';

    /** @var array<string, mixed> */
    public array $updatedAttributes = [];

    /**
     * @param  array<string, mixed>  $attributes
     */
    public function update(array $attributes = [], array $options = []): bool
    {
        $this->updatedAttributes = $attributes;

        return true;
    }
>>>>>>> .merge_file_dkGwqY
}
