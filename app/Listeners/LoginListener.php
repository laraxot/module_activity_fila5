<?php

declare(strict_types=1);

namespace Modules\Activity\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Modules\Activity\Models\Activity;

class LoginListener
{
    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $properties = [
            'guard' => $event->guard,
            'ip_address' => Request::ip(),
            'user_agent' => mb_substr((string) (Request::userAgent() ?? ''), 0, 512),
            'timestamp' => now()->timestamp,
        ];

        $activity = new Activity;
        $activity->log_name = 'auth';
        $activity->description = 'User logged in';
        $activity->event = 'login';

        if ($event->user instanceof Model) {
            $activity->causer()->associate($event->user);
        }

        $activity->properties = $properties;
        $activity->save();
    }
}
