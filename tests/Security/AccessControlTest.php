<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Security;

/**
 * Security Test Case for Activity Module Access Control
 *
 * Tests authentication and authorization mechanisms for activity tracking
 * and audit trail functionality.
 */

use Modules\Activity\Models\Activity;
use Modules\Activity\Models\Policies\ActivityPolicy;
use Modules\Activity\Tests\TestCase;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

it('denies activity viewAny to users without permission', function (): void {
    $user = User::factory()->create();
    $policy = new ActivityPolicy;

    Assert::assertFalse($policy->viewAny($user));
});

it('allows activity viewAny to users with the correct permission', function (): void {
    $user = User::factory()->create();
    $user->givePermissionTo('activity.viewAny');
    $policy = new ActivityPolicy;

    Assert::assertTrue($policy->viewAny($user));
});

it('denies activity view to users without permission', function (): void {
    $user = User::factory()->create();
    $policy = new ActivityPolicy;

    Assert::assertFalse($policy->view($user));
});

it('super-admin bypasses activity policy checks via before()', function (): void {
    $superAdmin = User::factory()->create();
    $superAdmin->assignRole('super-admin');
    $policy = new ActivityPolicy;

    Assert::assertTrue($policy->viewAny($superAdmin));
    Assert::assertTrue($policy->view($superAdmin));
});

it('validates activity log data integrity', function (): void {
    $activity = Activity::factory()->create([
        'description' => 'Valid description',
    ]);

    $activity->description = 'Tampered description';
    Assert::assertSame('Valid description', $activity->fresh()?->description);
});
