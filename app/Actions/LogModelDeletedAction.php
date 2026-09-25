<?php

declare(strict_types=1);

namespace Modules\Activity\Actions;

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Models\Activity;
use Spatie\QueueableAction\QueueableAction;

/**
 * Log Model Deleted Action.
<<<<<<< HEAD
 *
 * Logs when a model is deleted using Queueable Actions
=======
 * Optimized for Laraxot architecture.
>>>>>>> 3cbe4341 (.)
 */
class LogModelDeletedAction
{
    use QueueableAction;

    public function __construct(
        public Model $model,
        public ?Model $user = null,
    ) {
<<<<<<< HEAD
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
=======
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
            subject: $this->model,
            properties: $properties,
            description: sprintf('%s was deleted', class_basename($this->model)),
        ))->execute();
>>>>>>> 3cbe4341 (.)
    }
}
