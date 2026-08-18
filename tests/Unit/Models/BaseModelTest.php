<?php

declare(strict_types=1);

use Modules\Activity\Models\BaseModel;
use Modules\Activity\Tests\TestCase;
use Modules\Xot\Models\XotBaseModel;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('BaseModel has correct connection', function () {
<<<<<<< HEAD
<<<<<<< HEAD
    $model = new class() extends BaseModel
=======
    $model = new class extends BaseModel
>>>>>>> 0a02158a (.)
=======
    $model = new class extends BaseModel
>>>>>>> 35d8cf69 (Initial commit)
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };
    $reflection = new ReflectionClass($model);
    $property = $reflection->getProperty('connection');
    $property->setAccessible(true);

    Assert::assertSame('activity', $property->getValue($model));
});

test('BaseModel extends XotBaseModel', function () {
<<<<<<< HEAD
<<<<<<< HEAD
    $model = new class() extends BaseModel
=======
    $model = new class extends BaseModel
>>>>>>> 0a02158a (.)
=======
    $model = new class extends BaseModel
>>>>>>> 35d8cf69 (Initial commit)
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };

    Assert::assertInstanceOf(XotBaseModel::class, $model);
});
