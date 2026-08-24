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
 * Il bootstrap Pest del modulo non lega cartelle a TestCase: ogni file
 * dichiara `uses()` nudo. Eseguire con:
 *   ./vendor/bin/pest -c Modules/Activity/phpunit.xml \
 *     --test-directory=Modules/Activity/tests Unit/Bootstrap
 */

test('activity models declare activity connection without database', function (): void {
    Assert::assertSame('activity', (new Activity())->getConnectionName());
    Assert::assertSame('activity', (new Snapshot())->getConnectionName());
    Assert::assertSame('activity', (new StoredEvent())->getConnectionName());
});

test('pest bootstrap binds no folder and requires no stub file', function (): void {
    $pestBootstrap = file_get_contents(__DIR__.'/../../Pest.php');

    // Solo chiamate eseguibili: il commento può citare pest()->extend
    Assert::assertStringNotContainsString('pest()->extend(', $pestBootstrap);
    Assert::assertDoesNotMatchRegularExpression('/^\s*uses\s*\(/m', $pestBootstrap);
    Assert::assertStringNotContainsString('require_once __DIR__', $pestBootstrap);
});

test('the nude uses declaration binds the activity module test case', function (): void {
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
