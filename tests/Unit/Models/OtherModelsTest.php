<?php

declare(strict_types=1);

use Modules\Activity\Models\BaseModel;
use Modules\Activity\Models\Snapshot;
use Modules\Activity\Models\StoredEvent;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('Snapshot model can be instantiated', function () {
<<<<<<< HEAD
<<<<<<< HEAD
    $snapshot = new Snapshot();
=======
    $snapshot = new Snapshot;
>>>>>>> 0a02158a (.)
=======
    $snapshot = new Snapshot;
>>>>>>> 35d8cf69 (Initial commit)

    Assert::assertInstanceOf(Snapshot::class, $snapshot);
});

test('StoredEvent model can be instantiated', function () {
<<<<<<< HEAD
<<<<<<< HEAD
    $storedEvent = new StoredEvent();
=======
    $storedEvent = new StoredEvent;
>>>>>>> 0a02158a (.)
=======
    $storedEvent = new StoredEvent;
>>>>>>> 35d8cf69 (Initial commit)

    Assert::assertInstanceOf(StoredEvent::class, $storedEvent);
});

test('BaseModel model can be instantiated', function () {
<<<<<<< HEAD
<<<<<<< HEAD
    $baseModel = new class() extends BaseModel
=======
    $baseModel = new class extends BaseModel
>>>>>>> 0a02158a (.)
=======
    $baseModel = new class extends BaseModel
>>>>>>> 35d8cf69 (Initial commit)
    {
        protected $table = 'activity_base_models';
    };

    Assert::assertInstanceOf(BaseModel::class, $baseModel);
});

test('Snapshot model has correct connection', function () {
<<<<<<< HEAD
<<<<<<< HEAD
    $snapshot = new Snapshot();
=======
    $snapshot = new Snapshot;
>>>>>>> 0a02158a (.)
=======
    $snapshot = new Snapshot;
>>>>>>> 35d8cf69 (Initial commit)

    Assert::assertIsString($snapshot->getConnectionName());
});

test('StoredEvent model has correct connection', function () {
<<<<<<< HEAD
<<<<<<< HEAD
    $storedEvent = new StoredEvent();
=======
    $storedEvent = new StoredEvent;
>>>>>>> 0a02158a (.)
=======
    $storedEvent = new StoredEvent;
>>>>>>> 35d8cf69 (Initial commit)

    Assert::assertIsString($storedEvent->getConnectionName());
});

test('BaseModel model has correct connection', function () {
<<<<<<< HEAD
<<<<<<< HEAD
    $baseModel = new class() extends BaseModel
=======
    $baseModel = new class extends BaseModel
>>>>>>> 0a02158a (.)
=======
    $baseModel = new class extends BaseModel
>>>>>>> 35d8cf69 (Initial commit)
    {
        protected $table = 'activity_base_models';
    };

    Assert::assertIsString($baseModel->getConnectionName());
});
