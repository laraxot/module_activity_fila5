<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
uses(\Modules\Activity\Tests\TestCase::class);

>>>>>>> 2d6a374 (.)
use Modules\Activity\Actions\LogActivityAction;
use Modules\Activity\Actions\LogModelCreatedAction;
use Modules\Activity\Actions\LogModelDeletedAction;
use Modules\Activity\Actions\LogModelUpdatedAction;
use Modules\Activity\Actions\LogUserLoginAction;
use Modules\Activity\Actions\LogUserLogoutAction;
use Modules\Activity\Models\Activity;
use Modules\Activity\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('LogActivityAction can execute', function () {
<<<<<<< HEAD
    $user = UserFactory::new()->createOne(['name' => 'Test User', 'password' => 'password']);
=======
    $user = User::factory()->create(['name' => 'Test User', 'email' => 'test@example.com', 'password' => 'password']);
>>>>>>> 2d6a374 (.)

    $action = new LogActivityAction(
        type: 'test_event',
        user: $user,
        description: 'Test Description'
    );

    $activity = $action->execute();

    Assert::assertInstanceOf(Activity::class, $activity);
    Assert::assertSame('test_event', $activity->event);
    Assert::assertSame('Test Description', $activity->description);
});

test('LogActivityAction handles null user', function () {
    $action = new LogActivityAction(
        type: 'test_event',
        user: null,
        description: 'Test Description'
    );

    $activity = $action->execute();

    Assert::assertInstanceOf(Activity::class, $activity);
    Assert::assertNull($activity->causer_id);
});

test('LogUserLoginAction can execute', function () {
<<<<<<< HEAD
    $user = UserFactory::new()->createOne(['name' => 'Test User', 'password' => 'password']);
=======
    $user = User::factory()->create(['name' => 'Test User', 'email' => 'login@example.com', 'password' => 'password']);
>>>>>>> 2d6a374 (.)

    $action = new LogUserLoginAction($user);

    $activity = $action->execute();

    Assert::assertInstanceOf(Activity::class, $activity);
    Assert::assertSame('login', $activity->event);
});

test('LogUserLogoutAction can execute', function () {
<<<<<<< HEAD
    $user = UserFactory::new()->createOne(['name' => 'Test User', 'password' => 'password']);
=======
    $user = User::factory()->create(['name' => 'Test User', 'email' => 'logout@example.com', 'password' => 'password']);
>>>>>>> 2d6a374 (.)

    $action = new LogUserLogoutAction($user);

    $activity = $action->execute();

    Assert::assertInstanceOf(Activity::class, $activity);
    Assert::assertSame('logout', $activity->event);
});

test('LogModelCreatedAction can execute', function () {
<<<<<<< HEAD
    $user = UserFactory::new()->createOne(['name' => 'Test User', 'password' => 'password']);
=======
    $user = User::factory()->create(['name' => 'Test User', 'email' => 'created@example.com', 'password' => 'password']);
    $model = User::factory()->create(['name' => 'Subject User', 'email' => 'subject@example.com', 'password' => 'password']);
>>>>>>> 2d6a374 (.)

    $action = new LogModelCreatedAction($user);

    $activity = $action->execute();

    Assert::assertInstanceOf(Activity::class, $activity);
    Assert::assertSame('created', $activity->event);
});

test('LogModelUpdatedAction can execute', function () {
<<<<<<< HEAD
    $user = UserFactory::new()->createOne(['name' => 'Test User', 'password' => 'password']);
=======
    $user = User::factory()->create(['name' => 'Test User', 'email' => 'updated@example.com', 'password' => 'password']);
    $model = User::factory()->create(['name' => 'Subject User', 'email' => 'subject2@example.com', 'password' => 'password']);
>>>>>>> 2d6a374 (.)

    $action = new LogModelUpdatedAction($user);

    $activity = $action->execute();

    Assert::assertInstanceOf(Activity::class, $activity);
    Assert::assertSame('updated', $activity->event);
});

test('LogModelDeletedAction can execute', function () {
<<<<<<< HEAD
    $user = UserFactory::new()->createOne(['name' => 'Test User', 'password' => 'password']);
=======
    $user = User::factory()->create(['name' => 'Test User', 'email' => 'deleted@example.com', 'password' => 'password']);
    $model = User::factory()->create(['name' => 'Subject User', 'email' => 'subject3@example.com', 'password' => 'password']);
>>>>>>> 2d6a374 (.)

    $action = new LogModelDeletedAction($user);

    $activity = $action->execute();

    Assert::assertInstanceOf(Activity::class, $activity);
    Assert::assertSame('deleted', $activity->event);
});
