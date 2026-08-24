<?php

declare(strict_types=1);

use Modules\Activity\Database\Factories\ActivityFactory;
use Modules\Activity\Models\Activity;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('activity model can be created', function () {
    $activity = ActivityFactory::new()->makeOne();

    Assert::assertInstanceOf(Activity::class, $activity);
})->group('no-activity-db');

test('activity model can be saved and retrieved', function () {
    /** @var TestCase $this */
    if (TestCase::activityDbUnavailable()) {
        $this->skipTest('DB `activity_log` non raggiungibile: blocco di ambiente.');
    }

    $activity = ActivityFactory::new()->createOne([
        'description' => 'Test action',
        'event' => 'test_event',
    ]);

    $retrieved = Activity::find($activity->id);

    Assert::assertInstanceOf(Activity::class, $retrieved);
    Assert::assertSame('Test action', $retrieved->description);
    Assert::assertSame('test_event', $retrieved->event);
})->group('activity-db');

test('activity model has expected attributes', function () {
    $activity = ActivityFactory::new()->makeOne();

    $attrs = $activity->getAttributes();

    Assert::assertArrayHasKey('description', $attrs);
    Assert::assertArrayHasKey('event', $attrs);
})->group('no-activity-db');
