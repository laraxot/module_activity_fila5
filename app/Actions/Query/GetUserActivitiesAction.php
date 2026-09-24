<?php

declare(strict_types=1);

namespace Modules\Activity\Actions\Query;

use Illuminate\Database\Eloquent\Collection;
use InvalidArgumentException;
use Modules\Activity\Models\Activity;
<<<<<<< .merge_file_aGyBbl
use Modules\User\Models\User;
=======
use Modules\Xot\Contracts\UserContract;
>>>>>>> .merge_file_sY4QLL
use Spatie\QueueableAction\QueueableAction;

/**
 * Get activities caused by a user.
 */
class GetUserActivitiesAction
{
    use QueueableAction;

    /**
     * @return Collection<int, Activity>
     */
<<<<<<< .merge_file_aGyBbl
    public function execute(User $user, int $limit = 50): Collection
=======
    public function execute(UserContract $user, int $limit = 50): Collection
>>>>>>> .merge_file_sY4QLL
    {
        if ($limit <= 0) {
            throw new InvalidArgumentException('Limit must be positive');
        }

        return Activity::query()
            ->with('subject')
            ->whereIn('causer_id', [$user->getKey()])
            ->where('causer_type', $user::class)
            ->latest()
            ->limit($limit)
            ->get();
    }
}
