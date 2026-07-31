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

    public function __construct(
        public ?User $user = null
    ) {}

    /**
     * Execute the action.
     */
    public function execute(?User $user = null): Activity
    {
        $user = $user ?? $this->user ?? Auth::user();

        return (new LogActivityAction(
            type: 'login',
            user: $user,
            description: sprintf('User %s logged in', $user->name ?? 'unknown'),
            properties: [
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]
        ))->execute();
    }
}
