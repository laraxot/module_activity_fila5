<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Fixtures;

use Modules\Activity\Models\BaseModel;

/**
<<<<<<< HEAD
 * Test model per BaseModelTest.
=======
 * Test model for BaseModelTest.
>>>>>>> 3cbe4341 (.)
 *
 * Classe concreta per testing senza usare classi anonime,
 * garantendo piena conformità PSR-4.
 *
 * @property string|null $name
 */
final class TestBaseModel extends BaseModel
{
    /** @var string */
    protected $table = 'test_models';

<<<<<<< HEAD
=======
    /** @var string */
    protected $connection = 'mysql';

>>>>>>> 3cbe4341 (.)
    /** @var list<string> */
    protected $fillable = ['name'];
}
