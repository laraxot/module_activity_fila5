<?php

declare(strict_types=1);

use Modules\Activity\Models\BaseModel;
use Modules\Xot\Models\XotBaseModel;
use PHPUnit\Framework\Assert;

test('BaseModel has correct connection', function () {
    $model = new class() extends BaseModel
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
    $model = new class() extends BaseModel
    {
        protected $table = 'test_models';

        protected $fillable = ['name'];
    };

    Assert::assertInstanceOf(XotBaseModel::class, $model);
});
