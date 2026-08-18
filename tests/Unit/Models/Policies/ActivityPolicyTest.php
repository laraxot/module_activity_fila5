<?php

declare(strict_types=1);

use Modules\Activity\Models\Policies\ActivityBasePolicy;
use Modules\Activity\Models\Policies\ActivityPolicy;
use Modules\Activity\Models\Policies\SnapshotPolicy;
use Modules\Activity\Models\Policies\StoredEventPolicy;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('ActivityPolicy can be instantiated', function () {
<<<<<<< HEAD
    $policy = new ActivityPolicy();
=======
    $policy = new ActivityPolicy;
>>>>>>> 0a02158a (.)

    Assert::assertInstanceOf(ActivityPolicy::class, $policy);
});

test('ActivityBasePolicy is an abstract class', function () {
    $reflection = new ReflectionClass(ActivityBasePolicy::class);

    Assert::assertTrue($reflection->isAbstract());
});

test('SnapshotPolicy can be instantiated', function () {
<<<<<<< HEAD
    $policy = new SnapshotPolicy();
=======
    $policy = new SnapshotPolicy;
>>>>>>> 0a02158a (.)

    Assert::assertInstanceOf(SnapshotPolicy::class, $policy);
});

test('StoredEventPolicy can be instantiated', function () {
<<<<<<< HEAD
    $policy = new StoredEventPolicy();
=======
    $policy = new StoredEventPolicy;
>>>>>>> 0a02158a (.)

    Assert::assertInstanceOf(StoredEventPolicy::class, $policy);
});

test('ActivityPolicy method signatures', function () {
<<<<<<< HEAD
    $policy = new ActivityPolicy();
=======
    $policy = new ActivityPolicy;
>>>>>>> 0a02158a (.)
    $reflection = new ReflectionClass($policy);
    $expectedMethods = ['view', 'create', 'update', 'delete', 'restore', 'forceDelete'];

    foreach ($expectedMethods as $methodName) {
        Assert::assertTrue($reflection->hasMethod($methodName), "Missing method: {$methodName}");
        $method = $reflection->getMethod($methodName);
        Assert::assertCount(1, $method->getParameters());
    }
});
