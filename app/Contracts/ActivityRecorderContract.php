<?php

declare(strict_types=1);

namespace Modules\Activity\Contracts;

/**
 * Contract for activity recording across modules.
 * Modules should dispatch ActivityRecorded events instead of calling this directly.
 */
interface ActivityRecorderContract
{
    /**
     * Record a model action for audit trail.
     *
<<<<<<< .merge_file_LEPxRe
<<<<<<< HEAD
<<<<<<< .merge_file_4g901d
=======
>>>>>>> a95e8f36 (.)
     * @param class-string $modelClass
     * @param int|string $modelId
     * @param string $action create|update|delete|restore
     * @param array<string, mixed> $changes
<<<<<<< HEAD
=======
     * @param  class-string  $modelClass
     * @param  string  $action  create|update|delete|restore
     * @param  array<string, mixed>  $changes
>>>>>>> .merge_file_q7sKqQ
=======
>>>>>>> a95e8f36 (.)
=======
     * @param  class-string  $modelClass
     * @param  string  $action  create|update|delete|restore
     * @param  array<string, mixed>  $changes
>>>>>>> .merge_file_WL5q48
     */
    public function record(
        string $modelClass,
        int|string $modelId,
        string $action,
        array $changes = []
    ): void;

    /**
     * Get activity log for a model.
     *
     * @return array<int, array<string, mixed>>
     */
    public function getLog(string $modelClass, int|string $modelId): array;
}
