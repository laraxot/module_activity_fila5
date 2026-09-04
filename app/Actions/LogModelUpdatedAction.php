<?php

declare(strict_types=1);

namespace Modules\Activity\Actions;

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Models\Activity;
use Modules\Xot\Contracts\UserContract;
use Spatie\QueueableAction\QueueableAction;

/**
 * Log Model Updated Action.
 *
 * Logs when a model is updated using Queueable Actions
 */
class LogModelUpdatedAction
{
    use QueueableAction;

    public function __construct(
        public Model $model,
        public Model|UserContract|null $user = null,
    ) {
    }

    public function execute(): Activity
    {
        // PHPStan Level 10: Pass user as-is, LogActivityAction accepts both types
        $user = $this->user;

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
    }
}
