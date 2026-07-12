<?php

declare(strict_types=1);

namespace Modules\Activity\Actions;

use Illuminate\Database\Eloquent\Model;
use Modules\Activity\Models\Activity;
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
        public ?Model $user = null,
    ) {
    }

    public function execute(): Activity
    {
        $user = $this->user instanceof Model ? $this->user : null;
        $redact = app(RedactModelAttributesAction::class);

        $action = new LogActivityAction(
            type: 'updated',
            user: $user,
            subject: $this->model,
            properties: [
                'old' => $redact->execute($this->model->getOriginal()),
                'new' => $redact->execute($this->model->getAttributes()),
                'changes' => $redact->execute($this->model->getChanges()),
            ],
            description: sprintf('%s updated', class_basename($this->model))
        );

        return $action->execute();
    }
}
