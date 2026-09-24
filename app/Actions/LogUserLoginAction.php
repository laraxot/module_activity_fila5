<?php

declare(strict_types=1);

namespace Modules\Activity\Actions;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;
use Modules\Activity\Models\Activity;
use Modules\Xot\Contracts\UserContract;
<<<<<<< HEAD
=======
=======
use Modules\Activity\Models\Activity;
use Modules\User\Models\User;
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
use Spatie\QueueableAction\QueueableAction;

/**
 * Log User Login Action
 *
 * Logs when a user logs in using Queueable Actions
 */
class LogUserLoginAction
{
    use QueueableAction;

    public function __construct(
<<<<<<< HEAD
        public UserContract $user
=======
<<<<<<< HEAD
        public UserContract $user
=======
        public User $user
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
    ) {}

    public function execute(): Activity
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
        if (! $this->user instanceof Model) {
            throw new InvalidArgumentException('User must implement UserContract and extend Model');
        }

<<<<<<< HEAD
=======
=======
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
        $action = new LogActivityAction(
            type: 'login',
            user: $this->user,
            subject: $this->user,
            description: 'User logged in'
        );

        return $action->execute();
    }
}
