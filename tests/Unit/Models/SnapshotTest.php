<?php

declare(strict_types=1);

use Modules\Activity\Models\Snapshot;
use PHPUnit\Framework\Assert;
use Spatie\EventSourcing\Snapshots\EloquentSnapshot;

test('Snapshot model can be instantiated', function () {
    $reflection = new ReflectionClass(Snapshot::class);
    $snapshot = $reflection->newInstanceWithoutConstructor();

    Assert::assertIsObject($snapshot);
    // Verifichiamo che estenda il modello corretto da Spatie
    Assert::assertInstanceOf(EloquentSnapshot::class, $snapshot);
});

test('Snapshot model has correct connection', function () {
    $reflection = new ReflectionClass(Snapshot::class);
    $snapshot = $reflection->newInstanceWithoutConstructor();

    $property = $reflection->getProperty('connection');
    $property->setAccessible(true);

    Assert::assertSame('activity', $property->getValue($snapshot));
});
