<?php

declare(strict_types=1);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
use Modules\Activity\Models\BaseModel;
use Modules\Activity\Tests\TestCase;
use Modules\Xot\Models\XotBaseModel;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
uses(TestCase::class);

test('BaseModel has correct connection', function () {
    $model = new class extends BaseModel
<<<<<<< HEAD
=======
=======
uses(\Modules\Activity\Tests\TestCase::class);

test('BaseModel has correct connection', function () {
    $model = new class() extends BaseModel
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
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
    $model = new class extends BaseModel
=======
<<<<<<< HEAD
    $model = new class extends BaseModel
=======
    $model = new class() extends BaseModel
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };

    Assert::assertInstanceOf(XotBaseModel::class, $model);
});
