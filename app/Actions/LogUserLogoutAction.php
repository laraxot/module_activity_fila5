<?php

declare(strict_types=1);

namespace Modules\Activity\Actions;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use Modules\Activity\Models\Activity;
use Modules\Xot\Contracts\UserContract;
=======
use Modules\Activity\Models\Activity;
use Modules\User\Models\User;
>>>>>>> laraxot/dev
use Spatie\QueueableAction\QueueableAction;

/**
 * Log User Logout Action
 *
 * Logs when a user logs out using Queueable Actions
 */
class LogUserLogoutAction
{
    use QueueableAction;

    public function __construct(
<<<<<<< HEAD
        public UserContract $user
=======
        public User $user
>>>>>>> laraxot/dev
    ) {}

    public function execute(): Activity
    {
<<<<<<< HEAD
        if (! $this->user instanceof Model) {
            throw new InvalidArgumentException('User must implement UserContract and extend Model');
        }

=======
>>>>>>> laraxot/dev
        $action = new LogActivityAction(
            type: 'logout',
            user: $this->user,
            subject: $this->user,
            description: 'User logged out'
        );

        return $action->execute();
    }
}
