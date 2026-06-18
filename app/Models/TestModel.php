<?php

declare(strict_types=1);

namespace Modules\Activity\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Test model for Activity module tests.
 *
 * @property string|null $name
<<<<<<< HEAD
<<<<<<< HEAD
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestModel query()
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
=======
=======
 *
>>>>>>> 2d6a374 (.)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestModel query()
 *
 * @property int $id
<<<<<<< HEAD
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
>>>>>>> a1e3a4e (.)
=======
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
>>>>>>> 2d6a374 (.)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TestModel whereUpdatedAt($value)
<<<<<<< HEAD
<<<<<<< HEAD
 *
=======
>>>>>>> a1e3a4e (.)
=======
 *
>>>>>>> 2d6a374 (.)
 * @mixin \Eloquent
 */
final class TestModel extends Model
{
    protected $table = 'test_models';

    protected $fillable = ['name'];
}
