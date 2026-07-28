<?php

declare(strict_types=1);

namespace Modules\Activity\Actions;

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Models\Activity;
use Modules\User\Models\User;
use Spatie\QueueableAction\QueueableAction;

/**
 * Log Model Updated Action.
 * Optimized for Laraxot architecture.
 */
class LogModelUpdatedAction
{
    use QueueableAction;

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
    }
}
