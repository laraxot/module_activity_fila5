<?php

declare(strict_types=1);

namespace Modules\Activity\Actions;

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Models\Activity;
use Spatie\QueueableAction\QueueableAction;

/**
 * Log Model Deleted Action.
<<<<<<< HEAD
 * Optimized for Laraxot architecture.
=======
 *
 * Logs when a model is deleted using Queueable Actions
>>>>>>> laraxot/dev
 */
class LogModelDeletedAction
{
    use QueueableAction;

    public function __construct(
        public Model $model,
        public ?Model $user = null,
    ) {
<<<<<<< HEAD
    }

    /**
     * Execute the action.
     */
    public function execute(): Activity
    {
        /** @var array<string, mixed> $properties */
        $properties = $this->model->toArray();

        return (new LogActivityAction(
            type: 'deleted',
            user: $this->user,
            subject: $this->model,
            properties: $properties,
            description: sprintf('%s was deleted', class_basename($this->model)),
        ))->execute();
=======
        if ($user !== null) {
            // Type already narrowed to Model|null, assertion not needed
        }
    }

    public function execute(): Activity
    {
        // PHPStan Level 10: Explicit type guard for nullable Model
        $user = $this->user instanceof Model ? $this->user : null;

        $action = new LogActivityAction(
            type: 'deleted',
            user: $user,
            subject: $this->model,
            properties: ['attributes' => $this->model->getAttributes()],
            description: sprintf('%s deleted', class_basename($this->model))
        );

        return $action->execute();
>>>>>>> laraxot/dev
    }
}
