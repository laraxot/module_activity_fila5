<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Fixtures;

use Modules\Activity\Models\BaseModel;

/**
<<<<<<< HEAD
<<<<<<< HEAD
 * Test model for BaseModelTest.
=======
 * Test model per BaseModelTest.
>>>>>>> 0a02158a (.)
=======
 * Test model per BaseModelTest.
>>>>>>> 35d8cf69 (Initial commit)
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
<<<<<<< HEAD
    /** @var string */
    protected $connection = 'mysql';

=======
>>>>>>> 0a02158a (.)
=======
>>>>>>> 35d8cf69 (Initial commit)
    /** @var list<string> */
    protected $fillable = ['name'];
}
