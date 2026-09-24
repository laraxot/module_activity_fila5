<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Adapters;

use Mockery;
use Modules\Activity\Actions\Query\GetSubjectActivityLogAction;
use Modules\Activity\Actions\RecordSubjectActivityAction;
use Modules\Activity\Adapters\ActivityRecorder;
use Modules\Activity\Models\Activity;
use PHPUnit\Framework\Assert;

afterEach(function (): void {
    Mockery::close();
});

test('ActivityRecorder record delega a RecordSubjectActivityAction', function (): void {
<<<<<<< .merge_file_rk2uBH
<<<<<<< HEAD
<<<<<<< .merge_file_vMj96r
    $activity = new Activity();
=======
    $activity = new Activity;
>>>>>>> .merge_file_y5IczX
=======
    $activity = new Activity();
>>>>>>> a95e8f36 (.)
=======
    $activity = new Activity;
>>>>>>> .merge_file_m3WLYM

    $mock = Mockery::mock(RecordSubjectActivityAction::class);
    mockeryExpect($mock->shouldReceive('execute'))
        ->once()
        ->with('Modules\\User\\Models\\User', 42, 'updated', ['name' => 'old'], null)
        ->andReturn($activity);
    app()->instance(RecordSubjectActivityAction::class, $mock);

<<<<<<< .merge_file_rk2uBH
<<<<<<< HEAD
<<<<<<< .merge_file_vMj96r
    (new ActivityRecorder())->record(
=======
    (new ActivityRecorder)->record(
>>>>>>> .merge_file_y5IczX
=======
    (new ActivityRecorder())->record(
>>>>>>> a95e8f36 (.)
=======
    (new ActivityRecorder)->record(
>>>>>>> .merge_file_m3WLYM
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

<<<<<<< .merge_file_rk2uBH
<<<<<<< HEAD
<<<<<<< .merge_file_vMj96r
    $result = (new ActivityRecorder())->getLog('Modules\\User\\Models\\User', 7);
=======
    $result = (new ActivityRecorder)->getLog('Modules\\User\\Models\\User', 7);
>>>>>>> .merge_file_y5IczX
=======
    $result = (new ActivityRecorder())->getLog('Modules\\User\\Models\\User', 7);
>>>>>>> a95e8f36 (.)
=======
    $result = (new ActivityRecorder)->getLog('Modules\\User\\Models\\User', 7);
>>>>>>> .merge_file_m3WLYM

    Assert::assertSame($logEntries, $result);
});
