<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Adapters;

use Mockery;
use Modules\Activity\Actions\Query\GetSubjectActivityLogAction;
use Modules\Activity\Actions\RecordSubjectActivityAction;
use Modules\Activity\Adapters\ActivityRecorder;
use Modules\Activity\Models\Activity;
<<<<<<< HEAD
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

=======
use PHPUnit\Framework\Assert;

>>>>>>> laraxot/dev
afterEach(function (): void {
    Mockery::close();
});

test('ActivityRecorder record delega a RecordSubjectActivityAction', function (): void {
<<<<<<< HEAD
    $activity = new Activity;
=======
    $activity = new Activity();
>>>>>>> laraxot/dev

    $mock = Mockery::mock(RecordSubjectActivityAction::class);
    mockeryExpect($mock->shouldReceive('execute'))
        ->once()
        ->with('Modules\\User\\Models\\User', 42, 'updated', ['name' => 'old'], null)
        ->andReturn($activity);
    app()->instance(RecordSubjectActivityAction::class, $mock);

<<<<<<< HEAD
    (new ActivityRecorder)->record(
=======
    (new ActivityRecorder())->record(
>>>>>>> laraxot/dev
        'Modules\\User\\Models\\User',
        42,
        'updated',
        ['name' => 'old'],
    );
});

test('ActivityRecorder getLog delega a GetSubjectActivityLogAction', function (): void {
    $logEntries = [['id' => 1, 'event' => 'updated']];

    $mock = Mockery::mock(GetSubjectActivityLogAction::class);
    mockeryExpect($mock->shouldReceive('execute'))
        ->once()
        ->with('Modules\\User\\Models\\User', 7)
        ->andReturn($logEntries);
    app()->instance(GetSubjectActivityLogAction::class, $mock);

<<<<<<< HEAD
    $result = (new ActivityRecorder)->getLog('Modules\\User\\Models\\User', 7);
=======
    $result = (new ActivityRecorder())->getLog('Modules\\User\\Models\\User', 7);
>>>>>>> laraxot/dev

    Assert::assertSame($logEntries, $result);
});
