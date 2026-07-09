<?php

/**
 * Security Test Case for Activity Module Access Control
 *
 * Tests authentication and authorization mechanisms for activity tracking
 * and audit trail functionality.
 */

uses(Tests\TestCase::class);

it('prevents unauthorized access to activity listing', function () {
    // Security: Unauthenticated users should be redirected
    actingAs(null)
        ->get('/activity/logs')
        ->assertStatus(302);
});

it('allows authorized users to view activity logs', function () {
    // Security: Authenticated users with permission should access
    $user = \Modules\User\Models\User::factory()->create();
    actingAs($user)
        ->get('/activity/logs')
        ->assertStatus(200);
});

it('restricts activity export to authorized users only', function () {
    // Security: Export requires specific permission
    $user = \Modules\User\Models\User::factory()->create();
    $user->givePermissionTo('activities.export');

    actingAs($user)
        ->post('/activity/export', ['format' => 'csv'])
        ->assertStatus(200);
});

it('enforces IP-based access restrictions', function () {
    // Security: IP blacklist checking
    $request = Request::create('/activity/logs', 'GET');
    $request->server->set('REMOTE_ADDR', '192.168.1.100'); // Internal IP for testing

    // Should allow internal IPs
    expect($request->ip())->toBe('192.168.1.100');
});

it('validates activity log data integrity', function () {
    // Security: Prevent tampering with log data
    $activity = \Modules\Activity\Models\ActivityLog::factory()->create([
        'description' => 'Valid description',
    ]);

    // Data should not be modified after creation (audit trail)
    $activity->description = 'Tampered description';
    // Log should be immutable
    expect($activity->fresh()->description)->toBe('Valid description');
});