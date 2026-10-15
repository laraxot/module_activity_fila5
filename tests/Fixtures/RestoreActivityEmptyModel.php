<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Fixtures;

use Illuminate\Database\Eloquent\Model;
<<<<<<< .merge_file_tZ5UKm
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
=======

/**
 * Modello finto minimo per i test di RestoreActivityAction (classe con nome, non anonima).
 */
final class RestoreActivityEmptyModel extends Model
{
    protected $table = 'stub_models';
>>>>>>> .merge_file_PtOn34
}
