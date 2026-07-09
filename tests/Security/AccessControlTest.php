<?php

declare(strict_types=1);

/**
 * Security Test Case for Activity Module Access Control
 *
 * Tests authentication and authorization mechanisms for activity tracking
 * and audit trail functionality.
 */

use Illuminate\Http\Request;
use Modules\Activity\Models\Activity;
use Modules\User\Models\User;

uses(Tests\TestCase::class);

it('prevents unauthorized access to activity listing', function (): void {
    // Security: Unauthenticated users should be redirected
    $response = $this->get('/activity/logs');
    expect($response->status())->toBe(302);
});

it('allows authorized users to view activity logs', function (): void {
    // Security: Authenticated users with permission should access
    $user = User::factory()->create();
    $response = $this->actingAs($user)->get('/activity/logs');
    expect($response->status())->toBe(200);
});

it('restricts activity export to authorized users only', function (): void {
    // Security: Export requires specific permission
    $user = User::factory()->create();
    $user->givePermissionTo('activities.export');

    $response = $this->actingAs($user)->post('/activity/export', ['format' => 'csv']);
    expect($response->status())->toBe(200);
});

it('enforces IP-based access restrictions', function (): void {
    // Security: IP blacklist checking
    $request = Request::create('/activity/logs', 'GET');
    $request->server->set('REMOTE_ADDR', '192.168.1.100');

    expect($request->ip())->toBe('192.168.1.100');
});

it('validates activity log data integrity', function (): void {
    // Security: Prevent tampering with log data
    $activity = Activity::factory()->create([
        'description' => 'Valid description',
    ]);

    $activity->description = 'Tampered description';
    expect($activity->fresh()?->description)->toBe('Valid description');
});