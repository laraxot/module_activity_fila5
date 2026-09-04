<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;
use Modules\User\Models\User;

use Illuminate\Auth\Events\Logout;
use Modules\Activity\Listeners\LogoutListener;
use Modules\Activity\Tests\TestCase;
use Modules\Xot\Contracts\UserContract;

describe('Logout Listener', function (): void {
    test('handle registra un evento logout per utente autenticato', function (): void {
        $user = new User();
        $user->forceFill(['id' => 'logout-user', 'name' => 'Logout User']);
        $user->exists = true;
        $listener = new LogoutListener();
        $event = new Logout('web', $user);

        $listener->handle($event);

        /** @var TestCase $this */
        $this->assertDatabaseHasRow('activity_log', [
            'log_name' => 'auth',
            'event' => 'logout',
            'causer_type' => 'user',
            'causer_id' => 'logout-user',
        ], 'activity');
    });
});
