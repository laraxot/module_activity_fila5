<?php

declare(strict_types=1);

namespace Modules\Activity\Actions;

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Models\Activity;
use Spatie\QueueableAction\QueueableAction;

/**
 * Log Model Updated Action.
<<<<<<< HEAD
 *
 * Logs when a model is updated using Queueable Actions
=======
 * Optimized for Laraxot architecture.
>>>>>>> 3cbe4341 (.)
 */
class LogModelUpdatedAction
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
            type: 'updated',
            user: $user,
            subject: $this->model,
            properties: [
                'old' => $this->model->getOriginal(),
                'new' => $this->model->getAttributes(),
                'changes' => $this->model->getChanges(),
            ],
            description: sprintf('%s updated', class_basename($this->model))
        );

        return $action->execute();
=======
    }

    /**
     * Execute the action.
     */
    public function execute(): Activity
    {
        return (new LogActivityAction(
            type: 'updated',
            subject: $this->model,
            properties: [
                'old' => $this->model->getOriginal(),
                'attributes' => $this->model->getChanges(),
            ],
            description: sprintf('%s was updated', class_basename($this->model)),
        ))->execute();
>>>>>>> 3cbe4341 (.)
    }
}
