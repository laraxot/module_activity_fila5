<?php

declare(strict_types=1);

namespace Modules\Activity\Actions;

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Models\Activity;
use Spatie\QueueableAction\QueueableAction;

/**
 * Log Model Created Action.
 * Optimized for Laraxot architecture.
 */
class LogModelCreatedAction
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
        /** @var array<string, mixed> $properties */
        $properties = $this->model->toArray();

        return (new LogActivityAction(
            type: 'created',
            user: $this->user,
            subject: $this->model,
            properties: $properties,
            description: sprintf('%s was created', class_basename($this->model)),
        ))->execute();
    }
}
