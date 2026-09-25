<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Actions;

use Modules\Activity\Actions\LogModelCreatedAction;
use Modules\Activity\Actions\LogModelDeletedAction;
use Modules\Activity\Actions\LogModelUpdatedAction;
use Modules\Activity\Actions\LogUserLogoutAction;
use Modules\Activity\Tests\TestCase;
<<<<<<< HEAD
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
=======
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

uses(\Modules\Activity\Tests\TestCase::class);
>>>>>>> laraxot/dev

/**
 * @param  array<string, mixed>  $attributes
 */
<<<<<<< HEAD
function createUser(array $attributes = []): User
{
    return (new UserFactory)->createOne($attributes);
=======
function createActivityLifecycleUser(array $attributes = []): User
{
    return activityCreateUser($attributes);
>>>>>>> laraxot/dev
}

test('Activity Lifecycle Actions', function () {

    test('can log model creation via LogModelCreatedAction', function () {
<<<<<<< HEAD
        $user = createUser(['name' => 'New User']);
        $action = new LogModelCreatedAction($user);
=======
        $user = createActivityLifecycleUser(['name' => 'New User']);
        $action = new LogModelCreatedAction(model: $user);
>>>>>>> laraxot/dev
        $activity = $action->execute();

        Assert::assertSame('created', $activity->log_name);
        Assert::assertSame($user->id, $activity->subject_id);
        Assert::assertStringContainsString((string) 'User was created', (string) $activity->description);
        Assert::assertArrayHasKey('name', (array) $activity->properties);
    });

    test('can log model update via LogModelUpdatedAction', function () {
<<<<<<< HEAD
        $user = createUser(['name' => 'Old Name']);
=======
        $user = createActivityLifecycleUser(['name' => 'Old Name']);
>>>>>>> laraxot/dev
        $user->name = 'New Name';
        // Note: in memory changes only for this test, as LogModelUpdatedAction uses getChanges()
        $user->syncChanges();

<<<<<<< HEAD
        $action = new LogModelUpdatedAction($user);
=======
        $action = new LogModelUpdatedAction(model: $user);
>>>>>>> laraxot/dev
        $activity = $action->execute();

        Assert::assertSame('updated', $activity->log_name);
        Assert::assertSame($user->id, $activity->subject_id);
        Assert::assertStringContainsString((string) 'User was updated', (string) $activity->description);
    });

    test('can log model deletion via LogModelDeletedAction', function () {
<<<<<<< HEAD
        $user = createUser();
        $action = new LogModelDeletedAction($user);
=======
        $user = createActivityLifecycleUser();
        $action = new LogModelDeletedAction(model: $user);
>>>>>>> laraxot/dev
        $activity = $action->execute();

        Assert::assertSame('deleted', $activity->log_name);
        Assert::assertSame($user->id, $activity->subject_id);
        Assert::assertStringContainsString((string) 'User was deleted', (string) $activity->description);
    });

    test('can log user logout via LogUserLogoutAction', function () {
<<<<<<< HEAD
        $user = createUser(['name' => 'Logged Out User']);
        $action = new LogUserLogoutAction($user);
=======
        $user = createActivityLifecycleUser(['name' => 'Logged Out User']);
        $action = new LogUserLogoutAction(user: $user);
>>>>>>> laraxot/dev
        $activity = $action->execute();

        Assert::assertSame('logout', $activity->log_name);
        Assert::assertSame($user->id, $activity->causer_id);
        Assert::assertStringContainsString((string) 'User Logged Out User logged out', (string) $activity->description);
    });
});
