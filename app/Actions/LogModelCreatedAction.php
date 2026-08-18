<?php

declare(strict_types=1);

namespace Modules\Activity\Actions;

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Models\Activity;
<<<<<<< HEAD
use Modules\User\Models\User;
=======
>>>>>>> 0a02158a (.)
use Spatie\QueueableAction\QueueableAction;

/**
 * Log Model Created Action.
<<<<<<< HEAD
 * Optimized for Laraxot architecture.
=======
 *
 * Logs when a model is created using Queueable Actions
>>>>>>> 0a02158a (.)
 */
class LogModelCreatedAction
{
    use QueueableAction;

<<<<<<< HEAD
    /**
     * Execute the action.
     */
    public function execute(Model $model, ?User $user = null): Activity
    {
        /** @var array<string, mixed> $properties */
        $properties = $model->toArray();

        return (new LogActivityAction(
            type: 'created',
            user: $user,
            subject: $model,
            description: sprintf('%s was created', class_basename($model)),
            properties: $properties
        ))->execute();
=======
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
            type: 'created',
            user: $user,
            subject: $this->model,
            properties: ['attributes' => $this->model->getAttributes()],
            description: sprintf('%s created', class_basename($this->model))
        );

        return $action->execute();
>>>>>>> 0a02158a (.)
    }
}
