<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Actions;

use Mockery;
use Modules\Activity\Actions\ActivityLogger as ActivityLoggerAction;
use Modules\Activity\Adapters\ActivityLogger as ActivityLoggerAdapter;
use Modules\Activity\Models\Activity;
<<<<<<< HEAD
use Modules\Activity\Tests\TestCase;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

=======
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

>>>>>>> laraxot/dev
afterEach(function (): void {
    Mockery::close();
});

test('ActivityLogger Action custom delega a log', function (): void {
<<<<<<< HEAD
    $activity = new Activity;
=======
    $activity = new Activity();
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
    expect(fn (): mixed => (new ActivityLoggerAction)->getByType(''))
=======
    expect(fn (): mixed => (new ActivityLoggerAction())->getByType(''))
>>>>>>> laraxot/dev
        ->toThrow(\InvalidArgumentException::class);
});

test('ActivityLogger Adapter login e logout sono invocabili con partial mock', function (): void {
<<<<<<< HEAD
    $activity = new Activity;
    $user = new User;
=======
    $activity = new Activity();
    $user = new User();
>>>>>>> laraxot/dev

    /** @var ActivityLoggerAdapter&Mockery\MockInterface $logger */
    $logger = Mockery::mock(ActivityLoggerAdapter::class)->makePartial();
    mockeryExpect($logger->shouldReceive('login'))->once()->with($user)->andReturn($activity);
    mockeryExpect($logger->shouldReceive('logout'))->once()->with($user)->andReturn($activity);

    Assert::assertSame($activity, $logger->login($user));
    Assert::assertSame($activity, $logger->logout($user));
});
