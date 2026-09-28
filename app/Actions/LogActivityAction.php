<?php

declare(strict_types=1);

namespace Modules\Activity\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use InvalidArgumentException;
use Modules\Activity\Models\Activity;
<<<<<<< HEAD
use Modules\Xot\Contracts\UserContract;
=======
use Modules\User\Models\User;
>>>>>>> laraxot/dev
use Spatie\QueueableAction\QueueableAction;

/**
 * Log Activity Action.
 *
 * Logs a single activity using Queueable Actions
 */
class LogActivityAction
{
    use QueueableAction;

    /**
     * @param  array<string, mixed>|null  $properties
     */
    public function __construct(
        public string $type,
        public ?Model $user = null,
        public ?Model $subject = null,
        public ?array $properties = null,
        public ?string $description = null,
    ) {
        if ($type === '') {
            throw new InvalidArgumentException('Type cannot be empty');
        }
    }

    public function execute(): Activity
    {
        $causerId = null;
        if ($this->user !== null) {
<<<<<<< HEAD
            if (! $this->user instanceof UserContract) {
                throw new InvalidArgumentException('User must implement UserContract');
=======
            if (! $this->user instanceof User) {
                throw new InvalidArgumentException('User must be an instance of User');
>>>>>>> laraxot/dev
            }
            // Type narrowing for user ID - use getAttribute for Eloquent models
            $userId = $this->user->getAttribute('id');
            $causerId = is_int($userId) || is_string($userId) ? $userId : null;
        }
        if ($causerId === null) {
            $causerId = Auth::id();
        }

        $activityClass = Activity::class;

        return $activityClass::create([
            'log_name' => $this->type,
            'description' => $this->description ?? sprintf('Activity: %s', $this->type),
            'subject_type' => $this->subject ? get_class($this->subject) : null,
            'subject_id' => $this->subject?->getKey(),
<<<<<<< HEAD
            'causer_type' => $this->user !== null ? $this->user::class : null,
=======
            'causer_type' => $this->user ? User::class : null,
>>>>>>> laraxot/dev
            'causer_id' => $causerId,
            'properties' => $this->properties,
            'event' => $this->type,
        ]);
    }
}
