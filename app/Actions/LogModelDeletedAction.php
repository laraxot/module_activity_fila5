<?php

declare(strict_types=1);

namespace Modules\Activity\Actions;

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Models\Activity;
use Spatie\QueueableAction\QueueableAction;

/**
 * Log Model Deleted Action.
 *
 * Logs when a model is deleted using Queueable Actions
 */
class LogModelDeletedAction
{
    use QueueableAction;

    public function __construct(
        public Model $model,
        public ?Model $user = null,
    ) {
    }

    public function execute(): Activity
    {
        $user = $this->user instanceof Model ? $this->user : null;

        $action = new LogActivityAction(
            type: 'deleted',
            user: $user,
            subject: $this->model,
            properties: ['attributes' => app(RedactModelAttributesAction::class)->execute($this->model->getAttributes())],
            description: sprintf('%s deleted', class_basename($this->model))
        );

        return $action->execute();
    }
}
