<?php

declare(strict_types=1);

namespace Modules\Activity\Actions;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use InvalidArgumentException;
use Modules\Activity\Models\Activity;
use Modules\Xot\Contracts\UserContract;
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
        public Model|UserContract|null $user = null,
        public Model|UserContract|null $subject = null,
        public ?array $properties = null,
        public ?string $description = null,
    ) {
        if ($type === '') {
            throw new InvalidArgumentException('Type cannot be empty');
        }
    }

    public function execute(): Activity
    {
        $user = $this->user;

        $causerId = null;
        $causer_type = null;
        if ($user instanceof UserContract || $user instanceof Model) {
            $userId = $user->getKey();
            $causerId = is_int($userId) || is_string($userId) ? $userId : null;
            $causer_type = $user::class;
        }
        if ($causerId === null) {
            $causerId = Auth::id();
        }

        $subject = $this->subject;

        return Activity::create([
            'log_name' => $this->type,
            'description' => $this->description ?? sprintf('Activity: %s', $this->type),
            'subject_type' => $subject?->getMorphClass(),
            'subject_id' => $subject?->getKey(),
            'causer_type' => $causer_type,
            'causer_id' => $causerId,
            'properties' => $this->properties,
            'event' => $this->type,
        ]);
    }
}
