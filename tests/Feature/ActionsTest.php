<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Feature;

use Modules\Activity\Actions\ActivityLogger;
use Modules\Activity\Actions\LogActivityAction;
use Modules\Activity\Actions\LogModelCreatedAction;
use Modules\Activity\Models\Activity;
use Modules\Activity\Tests\TestCase;
<<<<<<< HEAD
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

function createUser(): User
{
    return (new UserFactory)->createOne();
=======
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

uses(\Modules\Activity\Tests\TestCase::class);

function createActionsTestUser(): User
{
    return activityCreateUser();
>>>>>>> laraxot/dev
}

describe('ActivityLogger', function (): void {

    test('logs simple activity', function (): void {
<<<<<<< HEAD
        $user = createUser();
        $logger = new ActivityLogger;
=======
        $user = createActionsTestUser();
        $logger = new ActivityLogger();
>>>>>>> laraxot/dev
        $activity = $logger->log('test_event', $user);

        Assert::assertInstanceOf(Activity::class, $activity);
        Assert::assertSame('test_event', $activity->event);
        Assert::assertSame($user->id, $activity->causer_id);
    });

    test('logs created event', function (): void {
<<<<<<< HEAD
        $user = createUser();
        $logger = new ActivityLogger;
        $model = (new UserFactory)->createOne();
=======
        $user = createActionsTestUser();
        $logger = new ActivityLogger();
        $model = activityCreateUser();
>>>>>>> laraxot/dev

        $activity = $logger->created($model, $user);

        Assert::assertInstanceOf(Activity::class, $activity);
        Assert::assertSame('created', $activity->event);
        Assert::assertSame($model->id, $activity->subject_id);
    });

    test('logs updated event', function (): void {
<<<<<<< HEAD
        $user = createUser();
        $logger = new ActivityLogger;
        $model = (new UserFactory)->createOne();
=======
        $user = createActionsTestUser();
        $logger = new ActivityLogger();
        $model = activityCreateUser();
>>>>>>> laraxot/dev

        $activity = $logger->updated($model, $user);

        Assert::assertInstanceOf(Activity::class, $activity);
        Assert::assertSame('updated', $activity->event);
        Assert::assertSame($model->id, $activity->subject_id);
    });

    test('logs deleted event', function (): void {
<<<<<<< HEAD
        $user = createUser();
        $logger = new ActivityLogger;
        $model = (new UserFactory)->createOne();
=======
        $user = createActionsTestUser();
        $logger = new ActivityLogger();
        $model = activityCreateUser();
>>>>>>> laraxot/dev

        $activity = $logger->deleted($model, $user);

        Assert::assertInstanceOf(Activity::class, $activity);
        Assert::assertSame('deleted', $activity->event);
        Assert::assertSame($model->id, $activity->subject_id);
    });

    test('logs login event', function (): void {
<<<<<<< HEAD
        $user = createUser();
        $logger = new ActivityLogger;
=======
        $user = createActionsTestUser();
        $logger = new ActivityLogger();
>>>>>>> laraxot/dev
        $activity = $logger->login($user);

        Assert::assertInstanceOf(Activity::class, $activity);
        Assert::assertSame('login', $activity->event);
        Assert::assertStringContainsString((string) 'User logged in', (string) $activity->description);
    });

    test('logs logout event', function (): void {
<<<<<<< HEAD
        $user = createUser();
        $logger = new ActivityLogger;
=======
        $user = createActionsTestUser();
        $logger = new ActivityLogger();
>>>>>>> laraxot/dev
        $activity = $logger->logout($user);

        Assert::assertInstanceOf(Activity::class, $activity);
        Assert::assertSame('logout', $activity->event);
        Assert::assertStringContainsString((string) 'User logged out', (string) $activity->description);
    });
});

describe('LogActivityAction', function (): void {

    test('creates activity with user', function (): void {
<<<<<<< HEAD
        $user = createUser();
=======
        $user = createActionsTestUser();
>>>>>>> laraxot/dev
        $action = new LogActivityAction(
            type: 'test_type',
            user: $user,
            description: 'Test description'
        );
        $activity = $action->execute();

        Assert::assertSame('test_type', $activity->log_name);
        Assert::assertSame($user->id, $activity->causer_id);
    });
});

describe('LogModelCreatedAction', function (): void {
    test('logs model creation', function (): void {
<<<<<<< HEAD
        $model = (new UserFactory)->createOne();
        $action = new LogModelCreatedAction($model);
=======
        $model = activityCreateUser();
        $action = new LogModelCreatedAction(model: $model);
>>>>>>> laraxot/dev
        $activity = $action->execute();

        Assert::assertSame('created', $activity->event);
        Assert::assertSame($model->id, $activity->subject_id);
    });
});
