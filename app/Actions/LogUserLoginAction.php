<?php

declare(strict_types=1);

namespace Modules\Activity\Actions;

<<<<<<< HEAD
use Illuminate\Support\Facades\Auth;
=======
>>>>>>> laraxot/dev
use Modules\Activity\Models\Activity;
use Modules\User\Models\User;
use Spatie\QueueableAction\QueueableAction;

/**
<<<<<<< HEAD
 * Log User Login Action.
 * Optimized for Laraxot architecture.
=======
 * Log User Login Action
 *
 * Logs when a user logs in using Queueable Actions
>>>>>>> laraxot/dev
 */
class LogUserLoginAction
{
    use QueueableAction;

    public function __construct(
<<<<<<< HEAD
        public ?User $user = null,
    ) {
    }

    /**
     * Execute the action.
     */
    public function execute(): Activity
    {
        $user = $this->user ?? Auth::user();

        return (new LogActivityAction(
            type: 'login',
            user: $user,
            properties: [
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ],
            description: sprintf('User %s logged in', $user->name ?? 'unknown'),
        ))->execute();
=======
        public User $user
    ) {}

    public function execute(): Activity
    {
        $action = new LogActivityAction(
            type: 'login',
            user: $this->user,
            subject: $this->user,
            description: 'User logged in'
        );

        return $action->execute();
>>>>>>> laraxot/dev
    }
}
