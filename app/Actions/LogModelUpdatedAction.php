<?php

declare(strict_types=1);

namespace Modules\Activity\Actions;

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Models\Activity;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\User\Models\User;
=======
>>>>>>> 0a02158a (.)
=======
>>>>>>> 35d8cf69 (Initial commit)
use Spatie\QueueableAction\QueueableAction;

/**
 * Log Model Updated Action.
<<<<<<< HEAD
<<<<<<< HEAD
 * Optimized for Laraxot architecture.
=======
 *
 * Logs when a model is updated using Queueable Actions
>>>>>>> 0a02158a (.)
=======
 *
 * Logs when a model is updated using Queueable Actions
>>>>>>> 35d8cf69 (Initial commit)
 */
class LogModelUpdatedAction
{
    use QueueableAction;

<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * Execute the action.
     */
    public function execute(Model $model, ?User $user = null): Activity
    {
        return (new LogActivityAction(
            type: 'updated',
            user: $user,
            subject: $model,
            description: sprintf('%s was updated', class_basename($model)),
            properties: [
                'old' => $model->getOriginal(),
                'attributes' => $model->getChanges(),
            ]
        ))->execute();
=======
=======
>>>>>>> 35d8cf69 (Initial commit)
    public function __construct(
        public Model $model,
        public ?Model $user = null,
    ) {
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
<<<<<<< HEAD
>>>>>>> 0a02158a (.)
=======
>>>>>>> 35d8cf69 (Initial commit)
    }
}
