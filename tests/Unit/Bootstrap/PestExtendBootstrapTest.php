<?php

declare(strict_types=1);

use Modules\Activity\Database\Factories\ActivityFactory;
use Modules\Activity\Models\Activity;
use Modules\Activity\Models\Snapshot;
use Modules\Activity\Models\StoredEvent;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

use function Safe\file_get_contents;

uses(TestCase::class)->group('no-activity-db');

/*
 * Pilota pest()->extend(TestCase) — cartella Unit/Bootstrap (story 3.10).
 * Eseguire con:
 *   ./vendor/bin/pest -c Modules/Activity/phpunit.xml \
 *     --test-directory=Modules/Activity/tests Unit/Bootstrap
 */

test('activity models declare activity connection without database', function (): void {
    Assert::assertSame('activity', (new Activity())->getConnectionName());
    Assert::assertSame('activity', (new Snapshot())->getConnectionName());
    Assert::assertSame('activity', (new StoredEvent())->getConnectionName());
});

test('pest bootstrap declares extend and drops require_once', function (): void {
    $pestBootstrap = file_get_contents(__DIR__.'/../../Pest.php');

    Assert::assertStringContainsString('pest()->extend', $pestBootstrap);
    Assert::assertStringNotContainsString('require_once __DIR__', $pestBootstrap);
});

test('pest extend binds the activity module test case', function (): void {
    Assert::assertInstanceOf(TestCase::class, $this);
});

test('activity factory make produces valid model via extended testcase', function (): void {
    $activity = ActivityFactory::new()->make([
        'description' => 'bootstrap extend probe',
        'event' => 'probe',
    ]);

    Assert::assertInstanceOf(Activity::class, $activity);
    Assert::assertSame('bootstrap extend probe', $activity->description);
    Assert::assertSame('probe', $activity->event);
});

test('extended testcase bootstraps laravel application', function (): void {
    Assert::assertTrue(app()->bound('config'));
    Assert::assertSame('Activity', config('activity.name'));
});
