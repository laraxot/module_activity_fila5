<?php

declare(strict_types=1);

use Mockery\Expectation;
use Modules\Activity\Database\Factories\ActivityFactory;
use Modules\Activity\Models\Activity;
use Modules\Activity\Tests\TestCase;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

/**
 * Helper Pest/PHPStan — modulo Activity.
 *
 * @see Modules/Platform/tests/PestHelpers.php
 */

/**
 * @param  array<string, mixed>  $attributes
 */
function activityCreateUser(array $attributes = []): User
{
    if (TestCase::activityDbUnavailable()) {
        Assert::markTestSkipped('DB `activity_log` non raggiungibile: blocco di ambiente.');
    }

    $user = UserFactory::new()->createOne($attributes);
    assert($user instanceof User);

    return $user;
}

/**
 * @param  array<string, mixed>  $attributes
 */
function activityCreateActivity(array $attributes = []): Activity
{
    if (TestCase::activityDbUnavailable()) {
        Assert::markTestSkipped('DB `activity_log` non raggiungibile: blocco di ambiente.');
    }

    $activity = ActivityFactory::new()->createOne($attributes);
    assert($activity instanceof Activity);

    return $activity;
}

/**
 * Narrows the wide return type of Mockery's shouldReceive()/allows() to the
 * concrete Expectation class so chained calls like andReturn()/with() resolve.
 */
function mockeryExpect(mixed $expectation): Expectation
{
    \assert($expectation instanceof Expectation);

    return $expectation;
}
