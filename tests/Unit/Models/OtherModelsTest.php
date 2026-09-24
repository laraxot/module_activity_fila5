<?php

declare(strict_types=1);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
use Modules\Activity\Models\BaseModel;
use Modules\Activity\Models\Snapshot;
use Modules\Activity\Models\StoredEvent;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
uses(TestCase::class);

test('Snapshot model can be instantiated', function () {
    $snapshot = new Snapshot;
<<<<<<< HEAD
=======
=======
uses(\Modules\Activity\Tests\TestCase::class);

test('Snapshot model can be instantiated', function () {
    $snapshot = new Snapshot();
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev

    Assert::assertInstanceOf(Snapshot::class, $snapshot);
});

test('StoredEvent model can be instantiated', function () {
<<<<<<< HEAD
    $storedEvent = new StoredEvent;
=======
<<<<<<< HEAD
    $storedEvent = new StoredEvent;
=======
    $storedEvent = new StoredEvent();
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev

    Assert::assertInstanceOf(StoredEvent::class, $storedEvent);
});

test('BaseModel model can be instantiated', function () {
<<<<<<< HEAD
    $baseModel = new class extends BaseModel
=======
<<<<<<< HEAD
    $baseModel = new class extends BaseModel
=======
    $baseModel = new class() extends BaseModel
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
    {
        protected $table = 'activity_base_models';
    };

    Assert::assertInstanceOf(BaseModel::class, $baseModel);
});

test('Snapshot model has correct connection', function () {
<<<<<<< HEAD
    $snapshot = new Snapshot;
=======
<<<<<<< HEAD
    $snapshot = new Snapshot;
=======
    $snapshot = new Snapshot();
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev

    Assert::assertIsString($snapshot->getConnectionName());
});

test('StoredEvent model has correct connection', function () {
<<<<<<< HEAD
    $storedEvent = new StoredEvent;
=======
<<<<<<< HEAD
    $storedEvent = new StoredEvent;
=======
    $storedEvent = new StoredEvent();
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev

    Assert::assertIsString($storedEvent->getConnectionName());
});

test('BaseModel model has correct connection', function () {
<<<<<<< HEAD
    $baseModel = new class extends BaseModel
=======
<<<<<<< HEAD
    $baseModel = new class extends BaseModel
=======
    $baseModel = new class() extends BaseModel
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
    {
        protected $table = 'activity_base_models';
    };

    Assert::assertIsString($baseModel->getConnectionName());
});
