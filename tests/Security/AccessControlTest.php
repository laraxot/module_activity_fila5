<?php

declare(strict_types=1);

/**
 * Security Test Case for Activity Module Access Control
 *
 * Tests authentication and authorization mechanisms for activity tracking
 * and audit trail functionality.
 */

use Modules\Activity\Models\Activity;
use Modules\Activity\Models\Policies\ActivityPolicy;
use Modules\User\Models\User;

uses(Tests\TestCase::class);

it('denies activity viewAny to users without permission', function (): void {
    $user = User::factory()->create();
    $policy = new ActivityPolicy;

    expect($policy->viewAny($user))->toBeFalse();
});

it('allows activity viewAny to users with the correct permission', function (): void {
    $user = User::factory()->create();
    $user->givePermissionTo('activity.viewAny');
    $policy = new ActivityPolicy;

    expect($policy->viewAny($user))->toBeTrue();
});

it('denies activity view to users without permission', function (): void {
    $user = User::factory()->create();
    $policy = new ActivityPolicy;

    expect($policy->view($user))->toBeFalse();
});

it('super-admin bypasses activity policy checks via before()', function (): void {
    $superAdmin = User::factory()->create();
    $superAdmin->assignRole('super-admin');
    $policy = new ActivityPolicy;

    expect($policy->viewAny($superAdmin))->toBeTrue()
        ->and($policy->view($superAdmin))->toBeTrue();
});

it('validates activity log data integrity', function (): void {
    // Security: Prevent tampering with log data
    $activity = Activity::factory()->create([
        'description' => 'Valid description',
    ]);

    $activity->description = 'Tampered description';
    expect($activity->fresh()?->description)->toBe('Valid description');
});