<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Actions;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Collection;
=======
<<<<<<< .merge_file_2qxvHf
<<<<<<< HEAD
<<<<<<< .merge_file_tGRXxz
=======
use Illuminate\Database\Eloquent\Collection;
>>>>>>> .merge_file_xPrCUH
=======
>>>>>>> a95e8f36 (.)
=======
use Illuminate\Database\Eloquent\Collection;
>>>>>>> .merge_file_osrYjO
>>>>>>> laraxot/dev
use Mockery;
use Modules\Activity\Actions\ActivityLogger as ActivityLoggerAction;
use Modules\Activity\Adapters\ActivityLogger as ActivityLoggerAdapter;
use Modules\Activity\Models\Activity;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

afterEach(function (): void {
    Mockery::close();
});

test('ActivityLogger Action custom delega a log', function (): void {
<<<<<<< HEAD
    $activity = new Activity();
=======
<<<<<<< .merge_file_2qxvHf
<<<<<<< HEAD
<<<<<<< .merge_file_tGRXxz
    $activity = new Activity();
=======
    $activity = new Activity;
>>>>>>> .merge_file_xPrCUH
=======
    $activity = new Activity();
>>>>>>> a95e8f36 (.)
=======
    $activity = new Activity();
>>>>>>> .merge_file_osrYjO
>>>>>>> laraxot/dev

    /** @var ActivityLoggerAction&Mockery\MockInterface $logger */
    $logger = Mockery::mock(ActivityLoggerAction::class)->makePartial();
    mockeryExpect($logger->shouldReceive('log'))
        ->once()
        ->with('evt', null, null, null, 'Descrizione')
        ->andReturn($activity);

    Assert::assertSame($activity, $logger->custom('evt', 'Descrizione'));
});

test('ActivityLogger Action getByType rifiuta type vuoto', function (): void {
<<<<<<< HEAD
    expect(fn (): mixed => (new ActivityLoggerAction())->getByType(''))
=======
<<<<<<< .merge_file_2qxvHf
<<<<<<< HEAD
<<<<<<< .merge_file_tGRXxz
    expect(fn (): mixed => (new ActivityLoggerAction())->getByType(''))
=======
    expect(fn (): Collection => (new ActivityLoggerAction)->getByType(''))
>>>>>>> .merge_file_xPrCUH
=======
    expect(fn (): mixed => (new ActivityLoggerAction())->getByType(''))
>>>>>>> a95e8f36 (.)
=======
    expect(fn (): mixed => (new ActivityLoggerAction())->getByType(''))
>>>>>>> .merge_file_osrYjO
>>>>>>> laraxot/dev
        ->toThrow(\InvalidArgumentException::class);
});

test('ActivityLogger Adapter login e logout sono invocabili con partial mock', function (): void {
<<<<<<< HEAD
    $activity = new Activity();
    $user = new User();
=======
<<<<<<< .merge_file_2qxvHf
<<<<<<< HEAD
<<<<<<< .merge_file_tGRXxz
    $activity = new Activity();
    $user = new User();
=======
    $activity = new Activity;
    $user = new User;
>>>>>>> .merge_file_xPrCUH
=======
    $activity = new Activity();
    $user = new User();
>>>>>>> a95e8f36 (.)
=======
    $activity = new Activity();
    $user = new User();
>>>>>>> .merge_file_osrYjO
>>>>>>> laraxot/dev

    /** @var ActivityLoggerAdapter&Mockery\MockInterface $logger */
    $logger = Mockery::mock(ActivityLoggerAdapter::class)->makePartial();
    mockeryExpect($logger->shouldReceive('login'))->once()->with($user)->andReturn($activity);
    mockeryExpect($logger->shouldReceive('logout'))->once()->with($user)->andReturn($activity);

    Assert::assertSame($activity, $logger->login($user));
    Assert::assertSame($activity, $logger->logout($user));
});
