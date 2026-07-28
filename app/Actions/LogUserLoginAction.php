<?php

declare(strict_types=1);

namespace Modules\Activity\Actions;

use Illuminate\Support\Facades\Auth;
use Modules\Activity\Models\Activity;
use Modules\User\Models\User;
use Spatie\QueueableAction\QueueableAction;

/**
 * Log User Login Action.
 * Optimized for Laraxot architecture.
 */
class LogUserLoginAction
{
    use QueueableAction;

<<<<<<< .merge_file_EEwZtR
    public function __construct(
        public User $user
    ) {}

    public function execute(): Activity
=======
    /**
     * Execute the action.
     */
    public function execute(?User $user = null): Activity
>>>>>>> .merge_file_9DUINB
    {
        $user = $user ?? Auth::user();
        
        return app(LogActivityAction::class)->execute(
            type: 'login',
            user: $user,
            description: sprintf('User %s logged in', $user->name ?? 'unknown'),
            properties: [
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]
        );
    }
}
