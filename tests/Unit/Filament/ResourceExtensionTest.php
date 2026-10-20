<?php

declare(strict_types=1);

use Modules\Activity\Filament\Resources\ActivityResource;
use Modules\Activity\Filament\Resources\SnapshotResource;
use Modules\Activity\Filament\Resources\StoredEventResource;
use Modules\Xot\Filament\Resources\XotBaseResource;

test('activity resources extend xot base resource', function () {
    \PHPUnit\Framework\Assert::assertTrue(is_subclass_of(ActivityResource::class, XotBaseResource::class));

    \PHPUnit\Framework\Assert::assertTrue(is_subclass_of(SnapshotResource::class, XotBaseResource::class));

    \PHPUnit\Framework\Assert::assertTrue(is_subclass_of(StoredEventResource::class, XotBaseResource::class));
});

test('activity resource does not implement unnecessary methods', function () {
    $reflection = new ReflectionClass(ActivityResource::class);

    \PHPUnit\Framework\Assert::assertFalse($reflection->hasMethod('getPages'));
    \PHPUnit\Framework\Assert::assertFalse($reflection->hasMethod('getRelations'));
    \PHPUnit\Framework\Assert::assertFalse($reflection->hasMethod('form'));
    \PHPUnit\Framework\Assert::assertFalse($reflection->hasMethod('table'));
});

test('activity resource implements required getFormSchema method', function () {
    $reflection = new ReflectionClass(ActivityResource::class);

    \PHPUnit\Framework\Assert::assertTrue($reflection->hasMethod('getFormSchema'));

    $method = $reflection->getMethod('getFormSchema');
    \PHPUnit\Framework\Assert::assertTrue($method->isPublic());
    \PHPUnit\Framework\Assert::assertTrue($method->isStatic());
    \PHPUnit\Framework\Assert::assertSame('array', $method->getReturnType()?->getName());
});

test('snapshot resource should not implement unnecessary methods', function () {
    $reflection = new ReflectionClass(SnapshotResource::class);

    // These methods should NOT be implemented (they return standard values)
    $hasUnnecessaryPages = $reflection->hasMethod('getPages');
    $hasUnnecessaryRelations = $reflection->hasMethod('getRelations');

    if ($hasUnnecessaryPages) {
        $pagesMethod = $reflection->getMethod('getPages');
        $pagesValue = $pagesMethod->invoke(null);

        // If it returns standard pages, it shouldn't be implemented
        $isStandardPages = isset($pagesValue['index'], $pagesValue['create'], $pagesValue['edit']);

        \PHPUnit\Framework\Assert::assertFalse($isStandardPages);
    }

    if ($hasUnnecessaryRelations) {
        $relationsMethod = $reflection->getMethod('getRelations');
        $relationsValue = $relationsMethod->invoke(null);

        // If it returns empty array, it shouldn't be implemented
        $isEmptyRelations = empty($relationsValue);

        \PHPUnit\Framework\Assert::assertFalse($isEmptyRelations);
    }
});

test('stored event resource should not implement unnecessary methods', function () {
    $reflection = new ReflectionClass(StoredEventResource::class);

    // These methods should NOT be implemented (they return standard values)
    $hasUnnecessaryPages = $reflection->hasMethod('getPages');
    $hasUnnecessaryRelations = $reflection->hasMethod('getRelations');

    if ($hasUnnecessaryPages) {
        $pagesMethod = $reflection->getMethod('getPages');
        $pagesValue = $pagesMethod->invoke(null);

        // If it returns standard pages, it shouldn't be implemented
        $isStandardPages = isset($pagesValue['index'], $pagesValue['create'], $pagesValue['edit']);

        \PHPUnit\Framework\Assert::assertFalse($isStandardPages);
    }

    if ($hasUnnecessaryRelations) {
        $relationsMethod = $reflection->getMethod('getRelations');
        $relationsValue = $relationsMethod->invoke(null);

        // If it returns empty array, it shouldn't be implemented
        $isEmptyRelations = empty($relationsValue);

        \PHPUnit\Framework\Assert::assertFalse($isEmptyRelations);
    }
});

test('activity resource has correct model configuration', function () {
    \PHPUnit\Framework\Assert::assertSame('Modules\\Activity\\Models\\Activity', ActivityResource::getModel());

    \PHPUnit\Framework\Assert::assertSame('Modules\\Activity\\Models\\Snapshot', SnapshotResource::getModel());

    \PHPUnit\Framework\Assert::assertSame('Modules\\Activity\\Models\\StoredEvent', StoredEventResource::getModel());
});

test('activity resource form schema returns array', function () {
    $form = ActivityResource::getFormSchema();

    \PHPUnit\Framework\Assert::assertIsArray($form);
    \PHPUnit\Framework\Assert::assertNotEmpty($form);

    // Verify it contains expected fields
    \PHPUnit\Framework\Assert::assertArrayHasKey('log_name', $form);
    \PHPUnit\Framework\Assert::assertArrayHasKey('description', $form);
    \PHPUnit\Framework\Assert::assertArrayHasKey('subject_type', $form);
    \PHPUnit\Framework\Assert::assertArrayHasKey('subject_id', $form);
    \PHPUnit\Framework\Assert::assertArrayHasKey('properties', $form);
});

test('snapshot resource form schema returns array', function () {
    $form = SnapshotResource::getFormSchema();

    \PHPUnit\Framework\Assert::assertIsArray($form);
    \PHPUnit\Framework\Assert::assertNotEmpty($form);

    // Verify it contains expected fields
    \PHPUnit\Framework\Assert::assertArrayHasKey('model_type', $form);
    \PHPUnit\Framework\Assert::assertArrayHasKey('model_id', $form);
    \PHPUnit\Framework\Assert::assertArrayHasKey('state', $form);
});

test('stored event resource form schema returns array', function () {
    $form = StoredEventResource::getFormSchema();

    \PHPUnit\Framework\Assert::assertIsArray($form);
    \PHPUnit\Framework\Assert::assertNotEmpty($form);

    // Verify it contains expected fields
    \PHPUnit\Framework\Assert::assertArrayHasKey('event_class', $form);
    \PHPUnit\Framework\Assert::assertArrayHasKey('event_properties', $form);
    \PHPUnit\Framework\Assert::assertArrayHasKey('aggregate_uuid', $form);
});

test('resources use proper xot base resource functionality', function () {
    // Test that the base resource functionality works
    $activityPages = ActivityResource::getPages();
    $snapshotPages = SnapshotResource::getPages();
    $storedEventPages = StoredEventResource::getPages();

    \PHPUnit\Framework\Assert::assertArrayHasKey('index', $activityPages);
    \PHPUnit\Framework\Assert::assertArrayHasKey('create', $activityPages);
    \PHPUnit\Framework\Assert::assertArrayHasKey('edit', $activityPages);
    \PHPUnit\Framework\Assert::assertArrayHasKey('index', $snapshotPages);
    \PHPUnit\Framework\Assert::assertArrayHasKey('create', $snapshotPages);
    \PHPUnit\Framework\Assert::assertArrayHasKey('edit', $snapshotPages);
    \PHPUnit\Framework\Assert::assertArrayHasKey('index', $storedEventPages);
    \PHPUnit\Framework\Assert::assertArrayHasKey('create', $storedEventPages);
    \PHPUnit\Framework\Assert::assertArrayHasKey('edit', $storedEventPages);

    // Test relation discovery
    $activityRelations = ActivityResource::getRelations();
    $snapshotRelations = SnapshotResource::getRelations();
    $storedEventRelations = StoredEventResource::getRelations();

    \PHPUnit\Framework\Assert::assertIsArray($activityRelations);
    \PHPUnit\Framework\Assert::assertIsArray($snapshotRelations);
    \PHPUnit\Framework\Assert::assertIsArray($storedEventRelations);
});

test('resources follow xot base resource naming conventions', function () {
    // Test that resource names follow conventions
    \PHPUnit\Framework\Assert::assertSame('ActivityResource', class_basename(ActivityResource::class));

    \PHPUnit\Framework\Assert::assertSame('SnapshotResource', class_basename(SnapshotResource::class));

    \PHPUnit\Framework\Assert::assertSame('StoredEventResource', class_basename(StoredEventResource::class));

    // Test that model names are correctly derived
    \PHPUnit\Framework\Assert::assertSame('Modules\\Activity\\Models\\Activity', ActivityResource::getModel());

    \PHPUnit\Framework\Assert::assertSame('Modules\\Activity\\Models\\Snapshot', SnapshotResource::getModel());

    \PHPUnit\Framework\Assert::assertSame('Modules\\Activity\\Models\\StoredEvent', StoredEventResource::getModel());
});
