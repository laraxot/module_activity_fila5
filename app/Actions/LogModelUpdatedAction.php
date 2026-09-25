<?php

declare(strict_types=1);

namespace Modules\Activity\Actions;

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Models\Activity;
use Spatie\QueueableAction\QueueableAction;

/**
 * Log Model Updated Action.
 * Optimized for Laraxot architecture.
 */
class LogModelUpdatedAction
{
    use QueueableAction;

    public function __construct(
        public Model $model,
        public ?Model $user = null,
    ) {
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
    }
}
