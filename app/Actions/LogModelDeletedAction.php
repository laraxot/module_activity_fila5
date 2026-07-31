<?php

declare(strict_types=1);

namespace Modules\Activity\Actions;

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Models\Activity;
use Modules\User\Models\User;
use Spatie\QueueableAction\QueueableAction;

/**
 * Log Model Deleted Action.
 * Optimized for Laraxot architecture.
 */
class LogModelDeletedAction
{
    use QueueableAction;

    /**
     * Execute the action.
     */
    public function execute(Model $model, ?User $user = null): Activity
    {
        /** @var array<string, mixed> $properties */
        $properties = $model->toArray();

        return (new LogActivityAction(
            type: 'deleted',
            user: $user,
            subject: $model,
            description: sprintf('%s was deleted', class_basename($model)),
            properties: $properties
        ))->execute();
    }
}
