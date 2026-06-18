<?php

declare(strict_types=1);

use Modules\Activity\Models\Activity;
use Modules\Activity\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

uses(\Modules\Activity\Tests\TestCase::class);

beforeEach(function () {
    // Skip if database not available
    try {
        \DB::connection()->getPdo();
    } catch (\Exception $e) {
        $this->markTestSkipped('Database not available: '.$e->getMessage());
    }
});

test('user can create activity', function () {
<<<<<<< HEAD
    $user = UserFactory::new()->createOne();
    Assert::assertInstanceOf(User::class, $user);
=======
    \assert($user instanceof User);
    expect($user)->not->toBeNull();
>>>>>>> 2b6968d (.)

    $activity = Activity::create([
        'log_name' => 'test',
        'description' => 'Test Description',
        'causer_type' => User::class,
        'causer_id' => $user->id,
    ]);
    Assert::assertNotNull($activity);

    Assert::assertInstanceOf(Activity::class, $activity);
    Assert::assertSame('Test Description', $activity->description);
    Assert::assertSame($user->id, $activity->causer_id);
});

test('activity can be updated', function () {
    $activity = Activity::create([
        'log_name' => 'test',
        'description' => 'Original Description',
    ]);
    $activity->update([
        'description' => 'Updated Description',
    ]);

    $freshActivity = $activity->fresh();
    Assert::assertNotNull($freshActivity);
    Assert::assertSame('Updated Description', $freshActivity->description);
});

test('activity can be deleted', function () {
    $activity = Activity::create([
        'log_name' => 'test',
        'description' => 'Test Description',
    ]);
    Assert::assertNotNull($activity);

    $activityId = $activity->id;
    $activity->delete();

    Assert::assertNull(Activity::find($activityId));
});

test('activity belongs to user', function () {
<<<<<<< HEAD
    $user = UserFactory::new()->createOne();
    Assert::assertInstanceOf(User::class, $user);
=======
    \assert($user instanceof User);
    expect($user)->not->toBeNull();
>>>>>>> 2b6968d (.)

    $activity = Activity::create([
        'log_name' => 'test',
        'description' => 'Test Description',
        'causer_type' => User::class,
        'causer_id' => $user->id,
    ]);
    Assert::assertNotNull($activity);

    $causer = $activity->causer;
    Assert::assertInstanceOf(User::class, $causer);
    Assert::assertSame($user->id, $causer->id);
});
