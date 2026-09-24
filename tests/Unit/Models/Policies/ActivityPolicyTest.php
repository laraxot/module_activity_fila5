<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> a95e8f36 (.)
use Modules\Activity\Models\Policies\ActivityBasePolicy;
use Modules\Activity\Models\Policies\ActivityPolicy;
use Modules\Activity\Models\Policies\SnapshotPolicy;
use Modules\Activity\Models\Policies\StoredEventPolicy;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);

test('ActivityPolicy can be instantiated', function () {
    $policy = new ActivityPolicy;
=======
uses(\Modules\Activity\Tests\TestCase::class);

test('ActivityPolicy can be instantiated', function () {
    $policy = new ActivityPolicy();
>>>>>>> a95e8f36 (.)

    Assert::assertInstanceOf(ActivityPolicy::class, $policy);
});

test('ActivityBasePolicy is an abstract class', function () {
    $reflection = new ReflectionClass(ActivityBasePolicy::class);

    Assert::assertTrue($reflection->isAbstract());
});

test('SnapshotPolicy can be instantiated', function () {
<<<<<<< HEAD
    $policy = new SnapshotPolicy;
=======
    $policy = new SnapshotPolicy();
>>>>>>> a95e8f36 (.)

    Assert::assertInstanceOf(SnapshotPolicy::class, $policy);
});

test('StoredEventPolicy can be instantiated', function () {
<<<<<<< HEAD
    $policy = new StoredEventPolicy;
=======
    $policy = new StoredEventPolicy();
>>>>>>> a95e8f36 (.)

    Assert::assertInstanceOf(StoredEventPolicy::class, $policy);
});

test('ActivityPolicy method signatures', function () {
<<<<<<< HEAD
    $policy = new ActivityPolicy;
=======
    $policy = new ActivityPolicy();
>>>>>>> a95e8f36 (.)
    $reflection = new ReflectionClass($policy);
    $expectedMethods = ['view', 'create', 'update', 'delete', 'restore', 'forceDelete'];

    foreach ($expectedMethods as $methodName) {
        Assert::assertTrue($reflection->hasMethod($methodName), "Missing method: {$methodName}");
        $method = $reflection->getMethod($methodName);
        Assert::assertCount(1, $method->getParameters());
    }
});
