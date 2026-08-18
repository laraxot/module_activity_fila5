<?php

declare(strict_types=1);

namespace Modules\Activity\Adapters;

use Modules\Activity\Actions\Query\GetSubjectActivityLogAction;
use Modules\Activity\Actions\RecordSubjectActivityAction;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Activity\Models\Contracts\ActivityRecorderContract;
=======
use Modules\Activity\Contracts\ActivityRecorderContract;
>>>>>>> 0a02158a (.)
=======
use Modules\Activity\Contracts\ActivityRecorderContract;
>>>>>>> 35d8cf69 (Initial commit)

/**
 * Adapter for ActivityRecorderContract — not a QueueableAction (multi-operation contract).
 */
class ActivityRecorder implements ActivityRecorderContract
{
<<<<<<< HEAD
<<<<<<< HEAD
    /**
     * @param  array<string, mixed>  $changes
     */
=======
>>>>>>> 0a02158a (.)
=======
>>>>>>> 35d8cf69 (Initial commit)
    public function record(
        string $modelClass,
        int|string $modelId,
        string $action,
        array $changes = []
    ): void {
<<<<<<< HEAD
<<<<<<< HEAD
        app(RecordSubjectActivityAction::class)->execute(
            $modelClass,
            $modelId,
            $action,
            $changes,
            null,
        );
    }

    /**
     * @return array<int, array<string, mixed>>
     */
=======
        app(RecordSubjectActivityAction::class)->execute($modelClass, $modelId, $action, $changes);
    }

>>>>>>> 0a02158a (.)
=======
        app(RecordSubjectActivityAction::class)->execute($modelClass, $modelId, $action, $changes);
    }

>>>>>>> 35d8cf69 (Initial commit)
    public function getLog(string $modelClass, int|string $modelId): array
    {
        return app(GetSubjectActivityLogAction::class)->execute($modelClass, $modelId);
    }
}
