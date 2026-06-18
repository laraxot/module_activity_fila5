<?php

declare(strict_types=1);

use Modules\Activity\Models\StoredEvent;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

<<<<<<< HEAD
describe('StoredEvent Business Logic', function (): void {
    test('stored event has correct connection configured', function (): void {
=======
describe('StoredEvent Business Logic', function(): void {
    beforeEach(function(): void {
        // Skip if database not available
        try {
            \DB::connection()->getPdo();
        } catch (\Exception $e) {
            $this->markTestSkipped('Database not available: '.$e->getMessage());
        }
    });

    test('stored event has correct connection configured', function(): void {
>>>>>>> 2b6968d (.)
        $storedEvent = new StoredEvent;

        Assert::assertSame('activity', $storedEvent->getConnectionName());
    });

    test('stored event has correct table configured', function(): void {
        $storedEvent = new StoredEvent;

        Assert::assertSame('stored_events', $storedEvent->getTable());
    });

    test('stored event has expected fillable fields for event sourcing', function(): void {
        $storedEvent = new StoredEvent;
        $expectedFillable = [
            'id',
            'aggregate_uuid',
            'aggregate_version',
            'event_version',
            'event_class',
            'event_properties',
            'meta_data',
            'created_at',
            'updated_by',
            'created_by',
        ];

<<<<<<< HEAD
        Assert::assertEquals($expectedFillable, $storedEvent->getFillable());
    });

    test('stored event has query builder methods documented', function (): void {
        $reflection = new ReflectionClass(StoredEvent::class);
=======
        expect($storedEvent->getFillable())->toEqual($expectedFillable);
    });

    test('stored event extends eloquent stored event for event sourcing', function(): void {
        expect(is_subclass_of(
            StoredEvent::class,
            EloquentStoredEvent::class,
        ))->toBeTrue();
    });

    test('stored event has query builder methods documented', function(): void {
        // Verify query builder methods are available through @method annotations in PHPDoc
        // These are provided by Spatie's EloquentStoredEventQueryBuilder:
        // - afterVersion(int $version)
        // - whereAggregateRoot(string $uuid)
        // - whereEvent(string ...$eventClasses)

        $reflection = new \ReflectionClass(StoredEvent::class);
>>>>>>> 2b6968d (.)
        $docComment = $reflection->getDocComment();

        Assert::assertStringContainsString('@method', (string) $docComment);
        Assert::assertStringContainsString('afterVersion', (string) $docComment);
        Assert::assertStringContainsString('whereAggregateRoot', (string) $docComment);
        Assert::assertStringContainsString('whereEvent', (string) $docComment);
    });
});
