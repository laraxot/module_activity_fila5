<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> a95e8f36 (.)
use Modules\Activity\Models\StoredEvent;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;
use Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEvent;

<<<<<<< HEAD
uses(TestCase::class);
=======
uses(\Modules\Activity\Tests\TestCase::class);
>>>>>>> a95e8f36 (.)

test('StoredEvent model can be instantiated', function () {
    $reflection = new ReflectionClass(StoredEvent::class);
    $storedEvent = $reflection->newInstanceWithoutConstructor();

    Assert::assertIsObject($storedEvent);
    // Verifichiamo che estenda il modello corretto da Spatie
    Assert::assertInstanceOf(EloquentStoredEvent::class, $storedEvent);
});

test('StoredEvent model has correct connection', function () {
    $reflection = new ReflectionClass(StoredEvent::class);
    $storedEvent = $reflection->newInstanceWithoutConstructor();

    $property = $reflection->getProperty('connection');
    $property->setAccessible(true);

    Assert::assertSame('activity', $property->getValue($storedEvent));
});
