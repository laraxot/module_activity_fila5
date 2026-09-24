<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Actions;

<<<<<<< .merge_file_0Fftr9
<<<<<<< HEAD
<<<<<<< .merge_file_UQlFJC
=======
use Illuminate\Database\Eloquent\Collection;
>>>>>>> .merge_file_n6dP3F
=======
>>>>>>> a95e8f36 (.)
=======
use Illuminate\Database\Eloquent\Collection;
>>>>>>> .merge_file_WRaXJ3
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
<<<<<<< .merge_file_0Fftr9
<<<<<<< HEAD
<<<<<<< .merge_file_UQlFJC
=======
use Modules\Activity\Models\Activity;
>>>>>>> .merge_file_n6dP3F
=======
>>>>>>> a95e8f36 (.)
=======
use Modules\Activity\Models\Activity;
>>>>>>> .merge_file_WRaXJ3
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;
use Webmozart\Assert\InvalidArgumentException as AssertInvalidArgumentException;

describe('Query Actions validation', function (): void {
    test('GetRecentActivitiesAction rifiuta limit non positivo', function (): void {
<<<<<<< .merge_file_0Fftr9
<<<<<<< HEAD
<<<<<<< .merge_file_UQlFJC
        expect(fn (): mixed => (new GetRecentActivitiesAction())->execute(0))
=======
        expect(fn (): Collection => (new GetRecentActivitiesAction)->execute(0))
>>>>>>> .merge_file_n6dP3F
=======
        expect(fn (): mixed => (new GetRecentActivitiesAction())->execute(0))
>>>>>>> a95e8f36 (.)
=======
        expect(fn (): mixed => (new GetRecentActivitiesAction())->execute(0))
>>>>>>> .merge_file_WRaXJ3
            ->toThrow(InvalidArgumentException::class, 'Limit must be positive');
    });

    test('GetUserActivitiesAction rifiuta limit non positivo', function (): void {
<<<<<<< .merge_file_0Fftr9
<<<<<<< HEAD
<<<<<<< .merge_file_UQlFJC
        expect(fn (): mixed => (new GetUserActivitiesAction())->execute(new User(), -1))
=======
        expect(fn (): Collection => (new GetUserActivitiesAction)->execute(new User, -1))
>>>>>>> .merge_file_n6dP3F
=======
        expect(fn (): mixed => (new GetUserActivitiesAction())->execute(new User(), -1))
>>>>>>> a95e8f36 (.)
=======
        expect(fn (): mixed => (new GetUserActivitiesAction())->execute(new User(), -1))
>>>>>>> .merge_file_WRaXJ3
            ->toThrow(InvalidArgumentException::class);
    });

    test('GetActivitiesByTypeAction rifiuta type vuoto e limit invalido', function (): void {
<<<<<<< .merge_file_0Fftr9
<<<<<<< HEAD
<<<<<<< .merge_file_UQlFJC
=======
>>>>>>> a95e8f36 (.)
=======
>>>>>>> .merge_file_WRaXJ3
        $action = new GetActivitiesByTypeAction();

        expect(fn (): mixed => $action->execute(''))
            ->toThrow(InvalidArgumentException::class, 'Type cannot be empty');

        expect(fn (): mixed => $action->execute('login', 0))
<<<<<<< .merge_file_0Fftr9
<<<<<<< HEAD
=======
        $action = new GetActivitiesByTypeAction;

        expect(fn (): Collection => $action->execute(''))
            ->toThrow(InvalidArgumentException::class, 'Type cannot be empty');

        expect(fn (): Collection => $action->execute('login', 0))
>>>>>>> .merge_file_n6dP3F
=======
>>>>>>> a95e8f36 (.)
=======
>>>>>>> .merge_file_WRaXJ3
            ->toThrow(InvalidArgumentException::class, 'Limit must be positive');
    });
});

describe('ActivityLogger Action validation', function (): void {
    test('getRecent getUserActivities getByType cleanOld validano input', function (): void {
<<<<<<< .merge_file_0Fftr9
<<<<<<< HEAD
<<<<<<< .merge_file_UQlFJC
=======
>>>>>>> a95e8f36 (.)
=======
>>>>>>> .merge_file_WRaXJ3
        $logger = new ActivityLoggerAction();
        $user = new User();

        expect(fn (): mixed => $logger->getRecent(0))
            ->toThrow(InvalidArgumentException::class);

        expect(fn (): mixed => $logger->getUserActivities($user, 0))
            ->toThrow(InvalidArgumentException::class);

        expect(fn (): mixed => $logger->getByType('', 10))
            ->toThrow(InvalidArgumentException::class, 'Type cannot be empty');

        expect(fn (): mixed => $logger->getByType('login', -2))
            ->toThrow(InvalidArgumentException::class);

        expect(fn (): mixed => $logger->cleanOld(0))
<<<<<<< .merge_file_0Fftr9
<<<<<<< HEAD
=======
        $logger = new ActivityLoggerAction;
        $user = new User;

        expect(fn (): Collection => $logger->getRecent(0))
            ->toThrow(InvalidArgumentException::class);

        expect(fn (): Collection => $logger->getUserActivities($user, 0))
            ->toThrow(InvalidArgumentException::class);

        expect(fn (): Collection => $logger->getByType('', 10))
            ->toThrow(InvalidArgumentException::class, 'Type cannot be empty');

        expect(fn (): Collection => $logger->getByType('login', -2))
            ->toThrow(InvalidArgumentException::class);

        expect(fn (): int => $logger->cleanOld(0))
>>>>>>> .merge_file_n6dP3F
=======
>>>>>>> a95e8f36 (.)
=======
>>>>>>> .merge_file_WRaXJ3
            ->toThrow(InvalidArgumentException::class, 'Days must be positive');
    });
});

test('LogActivityAction execute rifiuta user non User', function (): void {
<<<<<<< .merge_file_0Fftr9
<<<<<<< HEAD
<<<<<<< .merge_file_UQlFJC
=======
>>>>>>> a95e8f36 (.)
=======
>>>>>>> .merge_file_WRaXJ3
    $subject = new class() extends Model
    {
        protected $table = 'stub_models';
    };
    $invalidUser = new class() extends Model
<<<<<<< .merge_file_0Fftr9
<<<<<<< HEAD
=======
    $subject = new class extends Model
    {
        protected $table = 'stub_models';
    };
    $invalidUser = new class extends Model
>>>>>>> .merge_file_n6dP3F
=======
>>>>>>> a95e8f36 (.)
=======
>>>>>>> .merge_file_WRaXJ3
    {
        protected $table = 'users';
    };

    $action = new LogActivityAction(type: 'test', user: $invalidUser, subject: $subject);

<<<<<<< .merge_file_0Fftr9
<<<<<<< HEAD
<<<<<<< .merge_file_UQlFJC
    expect(fn (): mixed => $action->execute())
=======
    expect(fn (): Activity => $action->execute())
>>>>>>> .merge_file_n6dP3F
=======
    expect(fn (): mixed => $action->execute())
>>>>>>> a95e8f36 (.)
=======
    expect(fn (): mixed => $action->execute())
>>>>>>> .merge_file_WRaXJ3
        ->toThrow(InvalidArgumentException::class, 'User must be an instance of User');
});

describe('ActivityLogger Adapter validation', function (): void {
    test('log rifiuta user non User', function (): void {
<<<<<<< .merge_file_0Fftr9
<<<<<<< HEAD
<<<<<<< .merge_file_UQlFJC
        $logger = new ActivityLoggerAdapter();

        expect(fn (): mixed => $logger->log('event', new \stdClass()))
=======
        $logger = new ActivityLoggerAdapter;

        expect(fn (): Activity => $logger->log('event', new \stdClass))
>>>>>>> .merge_file_n6dP3F
=======
        $logger = new ActivityLoggerAdapter();

        expect(fn (): mixed => $logger->log('event', new \stdClass()))
>>>>>>> a95e8f36 (.)
=======
        $logger = new ActivityLoggerAdapter();

        expect(fn (): mixed => $logger->log('event', new \stdClass()))
>>>>>>> .merge_file_WRaXJ3
            ->toThrow(InvalidArgumentException::class, 'User must be an instance of User');
    });

    test('getRecent delega validazione limit', function (): void {
<<<<<<< .merge_file_0Fftr9
<<<<<<< HEAD
<<<<<<< .merge_file_UQlFJC
        expect(fn (): mixed => (new ActivityLoggerAdapter())->getRecent(0))
=======
        expect(fn (): Collection => (new ActivityLoggerAdapter)->getRecent(0))
>>>>>>> .merge_file_n6dP3F
=======
        expect(fn (): mixed => (new ActivityLoggerAdapter())->getRecent(0))
>>>>>>> a95e8f36 (.)
=======
        expect(fn (): mixed => (new ActivityLoggerAdapter())->getRecent(0))
>>>>>>> .merge_file_WRaXJ3
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

<<<<<<< .merge_file_0Fftr9
<<<<<<< HEAD
<<<<<<< .merge_file_UQlFJC
        (new ActivityRecorder())->record(User::class, 42, 'updated', ['name' => 'x']);
=======
        (new ActivityRecorder)->record(User::class, 42, 'updated', ['name' => 'x']);
>>>>>>> .merge_file_n6dP3F
=======
        (new ActivityRecorder())->record(User::class, 42, 'updated', ['name' => 'x']);
>>>>>>> a95e8f36 (.)
=======
        (new ActivityRecorder())->record(User::class, 42, 'updated', ['name' => 'x']);
>>>>>>> .merge_file_WRaXJ3

    });

    test('getLog delega a GetSubjectActivityLogAction', function (): void {
        $mock = Mockery::mock(GetSubjectActivityLogAction::class);
        mockeryExpect($mock->shouldReceive('execute'))
            ->once()
            ->with(User::class, 7)
            ->andReturn([['id' => 1]]);
        app()->instance(GetSubjectActivityLogAction::class, $mock);

<<<<<<< .merge_file_0Fftr9
<<<<<<< HEAD
<<<<<<< .merge_file_UQlFJC
        $log = (new ActivityRecorder())->getLog(User::class, 7);
=======
        $log = (new ActivityRecorder)->getLog(User::class, 7);
>>>>>>> .merge_file_n6dP3F
=======
        $log = (new ActivityRecorder())->getLog(User::class, 7);
>>>>>>> a95e8f36 (.)
=======
        $log = (new ActivityRecorder())->getLog(User::class, 7);
>>>>>>> .merge_file_WRaXJ3

        Assert::assertSame([['id' => 1]], $log);
    });
});

describe('RestoreActivityAction validation', function (): void {
    test('execute rifiuta oldProperties vuote', function (): void {
<<<<<<< .merge_file_0Fftr9
<<<<<<< HEAD
<<<<<<< .merge_file_UQlFJC
        $model = new class() extends Model
=======
        $model = new class extends Model
>>>>>>> .merge_file_n6dP3F
=======
        $model = new class() extends Model
>>>>>>> a95e8f36 (.)
=======
        $model = new class() extends Model
>>>>>>> .merge_file_WRaXJ3
        {
            protected $table = 'stub_models';
        };

<<<<<<< .merge_file_0Fftr9
<<<<<<< HEAD
<<<<<<< .merge_file_UQlFJC
        expect(fn () => (new RestoreActivityAction())->execute($model, []))
=======
        expect(fn () => (new RestoreActivityAction)->execute($model, []))
>>>>>>> .merge_file_n6dP3F
=======
        expect(fn () => (new RestoreActivityAction())->execute($model, []))
>>>>>>> a95e8f36 (.)
=======
        expect(fn () => (new RestoreActivityAction())->execute($model, []))
>>>>>>> .merge_file_WRaXJ3
            ->toThrow(AssertInvalidArgumentException::class);
    });
});
