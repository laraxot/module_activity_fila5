<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Actions;

use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use Mockery;
use Modules\Activity\Actions\ActivityLogger as ActivityLoggerAction;
use Modules\Activity\Actions\LogActivityAction;
use Modules\Activity\Actions\Query\GetActivitiesByTypeAction;
use Modules\Activity\Actions\Query\GetRecentActivitiesAction;
use Modules\Activity\Actions\Query\GetSubjectActivityLogAction;
use Modules\Activity\Actions\Query\GetUserActivitiesAction;
use Modules\Activity\Actions\RecordSubjectActivityAction;
use Modules\Activity\Actions\RestoreActivityAction;
use Modules\Activity\Adapters\ActivityLogger as ActivityLoggerAdapter;
use Modules\Activity\Adapters\ActivityRecorder;
<<<<<<< HEAD
use Modules\Activity\Tests\TestCase;
=======
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;
use Webmozart\Assert\InvalidArgumentException as AssertInvalidArgumentException;

describe('Query Actions validation', function (): void {
    test('GetRecentActivitiesAction rifiuta limit non positivo', function (): void {
        expect(fn (): mixed => (new GetRecentActivitiesAction())->execute(0))
>>>>>>> laraxot/dev
            ->toThrow(InvalidArgumentException::class, 'Limit must be positive');
    });

    test('GetUserActivitiesAction rifiuta limit non positivo', function (): void {
<<<<<<< HEAD
        expect(fn (): mixed => (new GetUserActivitiesAction)->execute(new User, -1))
=======
        expect(fn (): mixed => (new GetUserActivitiesAction())->execute(new User(), -1))
>>>>>>> laraxot/dev
            ->toThrow(InvalidArgumentException::class);
    });

    test('GetActivitiesByTypeAction rifiuta type vuoto e limit invalido', function (): void {
<<<<<<< HEAD
        $action = new GetActivitiesByTypeAction;
=======
        $action = new GetActivitiesByTypeAction();
>>>>>>> laraxot/dev

        expect(fn (): mixed => $action->execute(''))
            ->toThrow(InvalidArgumentException::class, 'Type cannot be empty');

        expect(fn (): mixed => $action->execute('login', 0))
            ->toThrow(InvalidArgumentException::class, 'Limit must be positive');
    });
});

describe('ActivityLogger Action validation', function (): void {
    test('getRecent getUserActivities getByType cleanOld validano input', function (): void {
<<<<<<< HEAD
        $logger = new ActivityLoggerAction;
        $user = new User;
=======
        $logger = new ActivityLoggerAction();
        $user = new User();
>>>>>>> laraxot/dev

        expect(fn (): mixed => $logger->getRecent(0))
            ->toThrow(InvalidArgumentException::class);

        expect(fn (): mixed => $logger->getUserActivities($user, 0))
            ->toThrow(InvalidArgumentException::class);

        expect(fn (): mixed => $logger->getByType('', 10))
            ->toThrow(InvalidArgumentException::class, 'Type cannot be empty');

        expect(fn (): mixed => $logger->getByType('login', -2))
            ->toThrow(InvalidArgumentException::class);

        expect(fn (): mixed => $logger->cleanOld(0))
            ->toThrow(InvalidArgumentException::class, 'Days must be positive');
    });
});

test('LogActivityAction execute rifiuta user non User', function (): void {
<<<<<<< HEAD
    $subject = new class extends Model
    {
        protected $table = 'stub_models';
    };
    $invalidUser = new class extends Model
=======
    $subject = new class() extends Model
    {
        protected $table = 'stub_models';
    };
    $invalidUser = new class() extends Model
>>>>>>> laraxot/dev
    {
        protected $table = 'users';
    };

    $action = new LogActivityAction(type: 'test', user: $invalidUser, subject: $subject);

    expect(fn (): mixed => $action->execute())
        ->toThrow(InvalidArgumentException::class, 'User must be an instance of User');
});

describe('ActivityLogger Adapter validation', function (): void {
    test('log rifiuta user non User', function (): void {
<<<<<<< HEAD
        $logger = new ActivityLoggerAdapter;

        expect(fn (): mixed => $logger->log('event', new \stdClass))
=======
        $logger = new ActivityLoggerAdapter();

        expect(fn (): mixed => $logger->log('event', new \stdClass()))
>>>>>>> laraxot/dev
            ->toThrow(InvalidArgumentException::class, 'User must be an instance of User');
    });

    test('getRecent delega validazione limit', function (): void {
<<<<<<< HEAD
        expect(fn (): mixed => (new ActivityLoggerAdapter)->getRecent(0))
=======
        expect(fn (): mixed => (new ActivityLoggerAdapter())->getRecent(0))
>>>>>>> laraxot/dev
            ->toThrow(InvalidArgumentException::class);
    });
});

describe('ActivityRecorder Adapter', function (): void {
    test('record delega a RecordSubjectActivityAction', function (): void {
        $mock = Mockery::mock(RecordSubjectActivityAction::class);
        mockeryExpect($mock->shouldReceive('execute'))
            ->once()
            ->with(User::class, 42, 'updated', ['name' => 'x'], null);
        app()->instance(RecordSubjectActivityAction::class, $mock);

<<<<<<< HEAD
        (new ActivityRecorder)->record(User::class, 42, 'updated', ['name' => 'x']);
=======
        (new ActivityRecorder())->record(User::class, 42, 'updated', ['name' => 'x']);
>>>>>>> laraxot/dev

    });

    test('getLog delega a GetSubjectActivityLogAction', function (): void {
        $mock = Mockery::mock(GetSubjectActivityLogAction::class);
        mockeryExpect($mock->shouldReceive('execute'))
            ->once()
            ->with(User::class, 7)
            ->andReturn([['id' => 1]]);
        app()->instance(GetSubjectActivityLogAction::class, $mock);

<<<<<<< HEAD
        $log = (new ActivityRecorder)->getLog(User::class, 7);
=======
        $log = (new ActivityRecorder())->getLog(User::class, 7);
>>>>>>> laraxot/dev

        Assert::assertSame([['id' => 1]], $log);
    });
});

describe('RestoreActivityAction validation', function (): void {
    test('execute rifiuta oldProperties vuote', function (): void {
<<<<<<< HEAD
        $model = new class extends Model
=======
        $model = new class() extends Model
>>>>>>> laraxot/dev
        {
            protected $table = 'stub_models';
        };

<<<<<<< HEAD
        expect(fn () => (new RestoreActivityAction)->execute($model, []))
=======
        expect(fn () => (new RestoreActivityAction())->execute($model, []))
>>>>>>> laraxot/dev
            ->toThrow(AssertInvalidArgumentException::class);
    });
});
