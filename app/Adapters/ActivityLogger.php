<?php

declare(strict_types=1);

namespace Modules\Activity\Adapters;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;
use Modules\Activity\Actions\ActivityMaintenanceAction;
use Modules\Activity\Actions\LogActivityAction;
use Modules\Activity\Actions\LogModelCreatedAction;
use Modules\Activity\Actions\LogModelDeletedAction;
use Modules\Activity\Actions\LogModelUpdatedAction;
use Modules\Activity\Actions\LogUserLoginAction;
use Modules\Activity\Actions\LogUserLogoutAction;
use Modules\Activity\Actions\Query\GetActivitiesByTypeAction;
use Modules\Activity\Actions\Query\GetActivityStatisticsAction;
use Modules\Activity\Actions\Query\GetModelActivitiesAction;
use Modules\Activity\Actions\Query\GetRecentActivitiesAction;
use Modules\Activity\Actions\Query\GetUserActivitiesAction;
use Modules\Activity\Models\Activity;
<<<<<<< HEAD
<<<<<<< .merge_file_BHZkMl
use Modules\User\Models\User;
=======
use Modules\Xot\Contracts\UserContract;
>>>>>>> .merge_file_EWEHOo
=======
use Modules\Xot\Contracts\UserContract;
>>>>>>> 472c43a3 (.)

/**
 * Coordinator — delegates to single-purpose QueueableActions (not an Action: multi-method API).
 */
class ActivityLogger
{
    /**
     * @param  array<string, mixed>|null  $properties
     */
    public function log(
        string $type,
        mixed $user = null,
        ?Model $subject = null,
        ?array $properties = null,
        ?string $description = null,
    ): Activity {
<<<<<<< HEAD
<<<<<<< .merge_file_BHZkMl
        if ($user !== null && ! $user instanceof User) {
            throw new InvalidArgumentException('User must be an instance of User');
=======
        if ($user !== null && (! $user instanceof UserContract || ! $user instanceof Model)) {
            throw new InvalidArgumentException('User must implement UserContract');
>>>>>>> .merge_file_EWEHOo
=======
        if ($user !== null && (! $user instanceof UserContract || ! $user instanceof Model)) {
            throw new InvalidArgumentException('User must implement UserContract');
>>>>>>> 472c43a3 (.)
        }

        $activity = (new LogActivityAction(
            type: $type,
<<<<<<< HEAD
<<<<<<< .merge_file_BHZkMl
            user: $user instanceof User ? $user : null,
=======
            user: $user instanceof Model ? $user : null,
>>>>>>> .merge_file_EWEHOo
=======
            user: $user instanceof Model ? $user : null,
>>>>>>> 472c43a3 (.)
            subject: $subject,
            properties: $properties,
            description: $description,
        ))->execute();

        Log::debug('Activity logged', [
            'activity_id' => $activity->id,
            'type' => $type,
        ]);

        return $activity;
    }

<<<<<<< HEAD
<<<<<<< .merge_file_BHZkMl
    public function created(Model $model, ?User $user = null): Activity
    {
        return (new LogModelCreatedAction($model, $user))->execute();
    }

    public function updated(Model $model, ?User $user = null): Activity
    {
        return (new LogModelUpdatedAction($model, $user))->execute();
    }

    public function deleted(Model $model, ?User $user = null): Activity
    {
        return (new LogModelDeletedAction($model, $user))->execute();
    }

    public function login(User $user): Activity
=======
=======
>>>>>>> 472c43a3 (.)
    public function created(Model $model, ?UserContract $user = null): Activity
    {
        return (new LogModelCreatedAction($model, $user instanceof Model ? $user : null))->execute();
    }

    public function updated(Model $model, ?UserContract $user = null): Activity
    {
        return (new LogModelUpdatedAction($model, $user instanceof Model ? $user : null))->execute();
    }

    public function deleted(Model $model, ?UserContract $user = null): Activity
    {
        return (new LogModelDeletedAction($model, $user instanceof Model ? $user : null))->execute();
    }

    public function login(UserContract $user): Activity
<<<<<<< HEAD
>>>>>>> .merge_file_EWEHOo
=======
>>>>>>> 472c43a3 (.)
    {
        return (new LogUserLoginAction($user))->execute();
    }

<<<<<<< HEAD
<<<<<<< .merge_file_BHZkMl
    public function logout(User $user): Activity
=======
    public function logout(UserContract $user): Activity
>>>>>>> .merge_file_EWEHOo
=======
    public function logout(UserContract $user): Activity
>>>>>>> 472c43a3 (.)
    {
        return (new LogUserLogoutAction($user))->execute();
    }

    /**
     * @param  array<string, mixed>|null  $properties
     */
    public function custom(
        string $type,
        string $description,
        ?Model $subject = null,
        ?array $properties = null,
    ): Activity {
        return $this->log($type, null, $subject, $properties, $description);
    }

    /** @return Collection<int, Activity> */
<<<<<<< HEAD
<<<<<<< .merge_file_BHZkMl
    public function getUserActivities(User $user, int $limit = 50): Collection
=======
    public function getUserActivities(UserContract $user, int $limit = 50): Collection
>>>>>>> .merge_file_EWEHOo
=======
    public function getUserActivities(UserContract $user, int $limit = 50): Collection
>>>>>>> 472c43a3 (.)
    {
        return app(GetUserActivitiesAction::class)->execute($user, $limit);
    }

    /** @return Collection<int, Activity> */
    public function getModelActivities(Model $model, int $limit = 50): Collection
    {
        return app(GetModelActivitiesAction::class)->execute($model, $limit);
    }

    /** @return Collection<int, Activity> */
    public function getByType(string $type, int $limit = 50): Collection
    {
        return app(GetActivitiesByTypeAction::class)->execute($type, $limit);
    }

    /** @return Collection<int, Activity> */
    public function getRecent(int $limit = 50): Collection
    {
        return app(GetRecentActivitiesAction::class)->execute($limit);
    }

    public function cleanOld(int $days = 90): int
    {
        return app(ActivityMaintenanceAction::class)->execute($days);
    }

    /**
     * @return array{total: int, by_type: array<string, int>, today: int, this_week: int, this_month: int}
     */
<<<<<<< HEAD
<<<<<<< .merge_file_BHZkMl
    public function getStatistics(?User $user = null): array
=======
    public function getStatistics(?UserContract $user = null): array
>>>>>>> .merge_file_EWEHOo
=======
    public function getStatistics(?UserContract $user = null): array
>>>>>>> 472c43a3 (.)
    {
        return app(GetActivityStatisticsAction::class)->execute($user);
    }
}
