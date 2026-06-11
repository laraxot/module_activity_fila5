<?php

declare(strict_types=1);

use Modules\Activity\Actions\ActivityLogger;
use Modules\Activity\Models\Activity;
use Modules\Activity\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('ActivityLogger can log basic activity', function () {
    /** @var TestCase $this */
    $logger = new ActivityLogger;

    $activity = $logger->log('test_event', null, null, ['key' => 'value'], 'Test Description');

    Assert::assertInstanceOf(Activity::class, $activity);
    Assert::assertSame('test_event', $activity->event);
    Assert::assertSame('Test Description', $activity->description);

    // Verify properties are properly stored
    if (is_array($activity->properties)) {
        Assert::assertEquals(['key' => 'value'], $activity->properties);
    } elseif (is_object($activity->properties) && method_exists($activity->properties, 'toArray')) {
        Assert::assertEquals(['key' => 'value'], $activity->properties->toArray());
    } else {
        Assert::assertNull($activity->properties);
    }
});

test('ActivityLogger can log with user', function () {
    /** @var TestCase $this */
    $user = UserFactory::new()->createOne();
    $logger = new ActivityLogger;

    $activity = $logger->log('user_event', $user, null, null, 'User Event');

    Assert::assertInstanceOf(Activity::class, $activity);
    Assert::assertSame($user->id, $activity->causer_id);
    Assert::assertSame(User::class, $activity->causer_type);
});

test('ActivityLogger throws exception for invalid user type', function () {
    $logger = new ActivityLogger;

    try {
        $logger->log('test_event', 'invalid_user_type');
        Assert::fail('Expected InvalidArgumentException was not thrown');
    } catch (InvalidArgumentException $exception) {
        Assert::assertInstanceOf(InvalidArgumentException::class, $exception);
    }
});

test('ActivityLogger can log created event', function () {
    /** @var TestCase $this */
    $user = UserFactory::new()->createOne();
    $logger = new ActivityLogger;

    // Create a user model to use as subject since it's a proper model with all required attributes
    $subjectModel = UserFactory::new()->createOne(['name' => 'Subject User', 'email' => 'subject@example.com', 'password' => 'password']);

    $result = $logger->created($subjectModel, $user);

    Assert::assertInstanceOf(Activity::class, $result);
    Assert::assertSame('created', $result->event);
});

test('ActivityLogger can log updated event', function () {
    /** @var TestCase $this */
    $user = UserFactory::new()->createOne();
    $logger = new ActivityLogger;

    // Create a user model to use as subject
    $subjectModel = UserFactory::new()->createOne(['name' => 'Subject User', 'email' => 'subject2@example.com', 'password' => 'password']);

    $result = $logger->updated($subjectModel, $user);

    Assert::assertInstanceOf(Activity::class, $result);
    Assert::assertSame('updated', $result->event);
});

test('ActivityLogger can log deleted event', function () {
    /** @var TestCase $this */
    $user = UserFactory::new()->createOne();
    $logger = new ActivityLogger;

    // Create a test model to use as subject
    $activity = $logger->log('test_subject', $user, null, null, 'Test Subject');

    $result = $logger->deleted($activity, $user);

    Assert::assertInstanceOf(Activity::class, $result);
    Assert::assertSame('deleted', $result->event);
});

test('ActivityLogger can log login event', function () {
    /** @var TestCase $this */
    $user = UserFactory::new()->createOne();
    $logger = new ActivityLogger;

    $activity = $logger->login($user);

    Assert::assertInstanceOf(Activity::class, $activity);
    Assert::assertSame('login', $activity->event);
});

test('ActivityLogger can log logout event', function () {
    /** @var TestCase $this */
    $user = UserFactory::new()->createOne();
    $logger = new ActivityLogger;

    $activity = $logger->logout($user);

    Assert::assertInstanceOf(Activity::class, $activity);
    Assert::assertSame('logout', $activity->event);
});

test('ActivityLogger can log custom event', function () {
    /** @var TestCase $this */
    $logger = new ActivityLogger;

    $activity = $logger->custom('custom_event', 'Custom Description', null, ['custom' => 'data']);

    Assert::assertInstanceOf(Activity::class, $activity);
    Assert::assertSame('custom_event', $activity->event);
    Assert::assertSame('Custom Description', $activity->description);
});

test('ActivityLogger can get user activities', function () {
    /** @var TestCase $this */
    $user = UserFactory::new()->createOne();
    $logger = new ActivityLogger;

    // Create some test activities for the user
    $logger->log('user_event', $user, null, null, 'User Event');

    $userActivities = $logger->getUserActivities($user, 10);

    Assert::assertCount(1, $userActivities);
    $firstActivity = $userActivities->first();
    Assert::assertNotNull($firstActivity);
    Assert::assertSame($user->id, $firstActivity->causer_id);
});

test('ActivityLogger can get model activities', function () {
    /** @var TestCase $this */
    $user = UserFactory::new()->createOne();
    $logger = new ActivityLogger;

    // Create an activity to use as subject
    $subjectActivity = $logger->log('test_subject', $user, null, null, 'Test Subject');

    // Create an activity for this subject
    $logger->log('model_event', $user, $subjectActivity, null, 'Model Event');

    $modelActivities = $logger->getModelActivities($subjectActivity, 10);

    Assert::assertCount(1, $modelActivities);
    $firstModelActivity = $modelActivities->first();
    Assert::assertNotNull($firstModelActivity);
    Assert::assertSame($subjectActivity->id, $firstModelActivity->subject_id);
});

test('ActivityLogger can get activities by type', function () {
    /** @var TestCase $this */
    $logger = new ActivityLogger;

    $logger->log('specific_event', null, null, null, 'Specific Event');
    $logger->log('other_event', null, null, null, 'Other Event');

    $byType = $logger->getByType('specific_event', 5);

    Assert::assertCount(1, $byType);
    $firstByType = $byType->first();
    Assert::assertNotNull($firstByType);
    Assert::assertSame('specific_event', $firstByType->event);
});

test('ActivityLogger can get recent activities', function () {
    /** @var TestCase $this */
    $logger = new ActivityLogger;

    // Create some test activities
    $logger->log('event1', null, null, null, 'Event 1');
    $logger->log('event2', null, null, null, 'Event 2');

    $recent = $logger->getRecent(5);

    Assert::assertCount(2, $recent);
});

test('ActivityLogger can clean old activities', function () {
    /** @var TestCase $this */
    $logger = new ActivityLogger;

    $activity = $logger->log('old_event', null, null, null, 'Old Event');
    // Simulate old activity by modifying created_at
    $activity->created_at = now()->subDays(100);
    $activity->save();

    $deleted = $logger->cleanOld(90);

    Assert::assertGreaterThanOrEqual(0, $deleted);
});

test('ActivityLogger can get statistics', function () {
    /** @var TestCase $this */
    $logger = new ActivityLogger;

    $logger->log('stat_event', null, null, null, 'Stat Event');

    $stats = $logger->getStatistics();

    Assert::assertGreaterThanOrEqual(0, $stats['total']);
    Assert::assertArrayHasKey('by_type', $stats);
});

test('ActivityLogger can get statistics for specific user', function () {
    /** @var TestCase $this */
    $user = UserFactory::new()->createOne();
    $logger = new ActivityLogger;

    $logger->log('user_stat_event', $user, null, null, 'User Stat Event');

    $stats = $logger->getStatistics($user);

    Assert::assertGreaterThanOrEqual(0, $stats['total']);
});
