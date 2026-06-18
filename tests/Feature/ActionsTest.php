<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Feature;

use Modules\Activity\Actions\ActivityLogger;
use Modules\Activity\Actions\LogActivityAction;
use Modules\Activity\Actions\LogModelCreatedAction;
use Modules\Activity\Models\Activity;
use Modules\Activity\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;
=======
use Tests\TestCase;
>>>>>>> 2d6a374 (.)

uses(\Modules\Activity\Tests\TestCase::class);

<<<<<<< HEAD
function createUser(): User
{
    return (new UserFactory)->createOne();
}

describe('ActivityLogger', function (): void {
=======
beforeEach(function(): void {
    $this->user = User::factory()->create();
});

<<<<<<< HEAD
describe('ActivityLogger', function(): void {
    it('logs simple activity', function(): void {
=======
describe('ActivityLogger', function (): void {
    it('logs simple activity', function (): void {
>>>>>>> 2d6a374 (.)
        $logger = new ActivityLogger;
        $activity = $logger->log('test_event', $this->user);
>>>>>>> 2b6968d (.)

    test('logs simple activity', function (): void {
        $user = createUser();
        $logger = new ActivityLogger;
        $activity = $logger->log('test_event', $user);

        Assert::assertInstanceOf(Activity::class, $activity);
        Assert::assertSame('test_event', $activity->event);
        Assert::assertSame($user->id, $activity->causer_id);
    });

<<<<<<< HEAD
<<<<<<< HEAD
    test('logs created event', function (): void {
        $user = createUser();
=======
    it('logs created event', function(): void {
>>>>>>> 2b6968d (.)
        $logger = new ActivityLogger;
        $model = (new UserFactory)->createOne();
=======
    it('logs created event', function (): void {
        $logger = new ActivityLogger;
        $model = User::factory()->create();

        $activity = $logger->created($model, $this->user);
>>>>>>> 2d6a374 (.)

        $activity = $logger->created($model, $user);

        Assert::assertInstanceOf(Activity::class, $activity);
        Assert::assertSame('created', $activity->event);
        Assert::assertSame($model->id, $activity->subject_id);
    });

<<<<<<< HEAD
<<<<<<< HEAD
    test('logs updated event', function (): void {
        $user = createUser();
=======
    it('logs updated event', function(): void {
>>>>>>> 2b6968d (.)
        $logger = new ActivityLogger;
        $model = (new UserFactory)->createOne();
=======
    it('logs updated event', function (): void {
        $logger = new ActivityLogger;
        $model = User::factory()->create();

        $activity = $logger->updated($model, $this->user);
>>>>>>> 2d6a374 (.)

        $activity = $logger->updated($model, $user);

        Assert::assertInstanceOf(Activity::class, $activity);
        Assert::assertSame('updated', $activity->event);
        Assert::assertSame($model->id, $activity->subject_id);
    });

<<<<<<< HEAD
<<<<<<< HEAD
    test('logs deleted event', function (): void {
        $user = createUser();
=======
    it('logs deleted event', function(): void {
>>>>>>> 2b6968d (.)
        $logger = new ActivityLogger;
        $model = (new UserFactory)->createOne();
=======
    it('logs deleted event', function (): void {
        $logger = new ActivityLogger;
        $model = User::factory()->create();

        $activity = $logger->deleted($model, $this->user);
>>>>>>> 2d6a374 (.)

        $activity = $logger->deleted($model, $user);

        Assert::assertInstanceOf(Activity::class, $activity);
        Assert::assertSame('deleted', $activity->event);
        Assert::assertSame($model->id, $activity->subject_id);
    });

<<<<<<< HEAD
<<<<<<< HEAD
    test('logs login event', function (): void {
        $user = createUser();
=======
    it('logs login event', function(): void {
>>>>>>> 2b6968d (.)
        $logger = new ActivityLogger;
        $activity = $logger->login($user);
=======
    it('logs login event', function (): void {
        $logger = new ActivityLogger;
        $activity = $logger->login($this->user);
>>>>>>> 2d6a374 (.)

        Assert::assertInstanceOf(Activity::class, $activity);
        Assert::assertSame('login', $activity->event);
        Assert::assertStringContainsString((string) 'User logged in', (string) $activity->description);
    });

<<<<<<< HEAD
<<<<<<< HEAD
    test('logs logout event', function (): void {
        $user = createUser();
=======
    it('logs logout event', function(): void {
>>>>>>> 2b6968d (.)
        $logger = new ActivityLogger;
        $activity = $logger->logout($user);
=======
    it('logs logout event', function (): void {
        $logger = new ActivityLogger;
        $activity = $logger->logout($this->user);
>>>>>>> 2d6a374 (.)

        Assert::assertInstanceOf(Activity::class, $activity);
        Assert::assertSame('logout', $activity->event);
        Assert::assertStringContainsString((string) 'User logged out', (string) $activity->description);
    });
});

<<<<<<< HEAD
describe('LogActivityAction', function (): void {

    test('creates activity with user', function (): void {
        $user = createUser();
        $action = new LogActivityAction(
=======
describe('LogActivityAction', function(): void {
    it('creates activity with user', function(): void {
        $action = app(LogActivityAction::class);
        $activity = $action->execute(
>>>>>>> 2b6968d (.)
            type: 'test_type',
            user: $user,
            description: 'Test description'
        );
        $activity = $action->execute();

        Assert::assertSame('test_type', $activity->log_name);
        Assert::assertSame($user->id, $activity->causer_id);
    });
});

<<<<<<< HEAD
describe('LogModelCreatedAction', function (): void {
    test('logs model creation', function (): void {
        $model = (new UserFactory)->createOne();
        $action = new LogModelCreatedAction(model: $model);
        $activity = $action->execute();
=======
describe('LogModelCreatedAction', function(): void {
    it('logs model creation', function(): void {
        $model = User::factory()->create();
        $action = app(LogModelCreatedAction::class);
<<<<<<< HEAD
>>>>>>> 2b6968d (.)
=======

        $activity = $action->execute($model);
>>>>>>> 2d6a374 (.)

        Assert::assertSame('created', $activity->event);
        Assert::assertSame($model->id, $activity->subject_id);
    });
});
