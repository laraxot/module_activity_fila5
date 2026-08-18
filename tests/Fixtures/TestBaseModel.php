<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Fixtures;

use Modules\Activity\Models\BaseModel;

/**
<<<<<<< HEAD
 * Test model for BaseModelTest.
=======
 * Test model per BaseModelTest.
>>>>>>> 0a02158a (.)
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
    /** @var string */
    protected $connection = 'mysql';

=======
>>>>>>> 0a02158a (.)
    /** @var list<string> */
    protected $fillable = ['name'];
}
