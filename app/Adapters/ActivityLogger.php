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
<<<<<<< .merge_file_B208IP
<<<<<<< HEAD
<<<<<<< .merge_file_9uFqwM
=======
>>>>>>> .merge_file_vurhrf
use Modules\User\Models\User;
use Modules\Xot\Contracts\UserContract;
<<<<<<< .merge_file_B208IP
>>>>>>> .merge_file_EWEHOo
>>>>>>> .merge_file_O1Az67
=======
use Modules\User\Models\User;
>>>>>>> a95e8f36 (.)
=======
>>>>>>> .merge_file_vurhrf

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
<<<<<<< .merge_file_B208IP
<<<<<<< HEAD
<<<<<<< .merge_file_9uFqwM
        if ($user !== null && ! $user instanceof User) {
            throw new InvalidArgumentException('User must be an instance of User');
=======
<<<<<<< .merge_file_BHZkMl
        if ($user !== null && ! $user instanceof User) {
            throw new InvalidArgumentException('User must be an instance of User');
=======
        if ($user !== null && (! $user instanceof UserContract || ! $user instanceof Model)) {
            throw new InvalidArgumentException('User must implement UserContract');
>>>>>>> .merge_file_EWEHOo
>>>>>>> .merge_file_O1Az67
=======
        if ($user !== null && ! $user instanceof User) {
            throw new InvalidArgumentException('User must be an instance of User');
>>>>>>> a95e8f36 (.)
=======
        if ($user !== null && ! $user instanceof User) {
            throw new InvalidArgumentException('User must be an instance of User');
>>>>>>> .merge_file_vurhrf
        }

        $activity = (new LogActivityAction(
            type: $type,
<<<<<<< .merge_file_B208IP
<<<<<<< HEAD
<<<<<<< .merge_file_9uFqwM
            user: $user instanceof User ? $user : null,
=======
<<<<<<< .merge_file_BHZkMl
            user: $user instanceof User ? $user : null,
=======
            user: $user instanceof Model ? $user : null,
>>>>>>> .merge_file_EWEHOo
>>>>>>> .merge_file_O1Az67
=======
            user: $user instanceof User ? $user : null,
>>>>>>> a95e8f36 (.)
=======
            user: $user instanceof User ? $user : null,
>>>>>>> .merge_file_vurhrf
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

<<<<<<< .merge_file_B208IP
<<<<<<< HEAD
<<<<<<< .merge_file_9uFqwM
=======
<<<<<<< .merge_file_BHZkMl
>>>>>>> .merge_file_O1Az67
=======
>>>>>>> a95e8f36 (.)
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
<<<<<<< HEAD
<<<<<<< .merge_file_9uFqwM
=======
=======
=======
>>>>>>> .merge_file_vurhrf
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
<<<<<<< .merge_file_B208IP
>>>>>>> .merge_file_EWEHOo
>>>>>>> .merge_file_O1Az67
=======
>>>>>>> a95e8f36 (.)
=======
>>>>>>> .merge_file_vurhrf
    {
        return (new LogUserLoginAction($user))->execute();
    }

<<<<<<< .merge_file_B208IP
<<<<<<< HEAD
<<<<<<< .merge_file_9uFqwM
    public function logout(User $user): Activity
=======
<<<<<<< .merge_file_BHZkMl
    public function logout(User $user): Activity
=======
    public function logout(UserContract $user): Activity
>>>>>>> .merge_file_EWEHOo
>>>>>>> .merge_file_O1Az67
=======
    public function logout(User $user): Activity
>>>>>>> a95e8f36 (.)
=======
    public function logout(UserContract $user): Activity
>>>>>>> .merge_file_vurhrf
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
<<<<<<< .merge_file_B208IP
<<<<<<< HEAD
<<<<<<< .merge_file_9uFqwM
    public function getUserActivities(User $user, int $limit = 50): Collection
=======
<<<<<<< .merge_file_BHZkMl
    public function getUserActivities(User $user, int $limit = 50): Collection
=======
    public function getUserActivities(UserContract $user, int $limit = 50): Collection
>>>>>>> .merge_file_EWEHOo
>>>>>>> .merge_file_O1Az67
=======
    public function getUserActivities(User $user, int $limit = 50): Collection
>>>>>>> a95e8f36 (.)
=======
    public function getUserActivities(User $user, int $limit = 50): Collection
>>>>>>> .merge_file_vurhrf
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
<<<<<<< .merge_file_B208IP
<<<<<<< HEAD
<<<<<<< .merge_file_9uFqwM
    public function getStatistics(?User $user = null): array
=======
<<<<<<< .merge_file_BHZkMl
    public function getStatistics(?User $user = null): array
=======
    public function getStatistics(?UserContract $user = null): array
>>>>>>> .merge_file_EWEHOo
>>>>>>> .merge_file_O1Az67
=======
    public function getStatistics(?User $user = null): array
>>>>>>> a95e8f36 (.)
=======
    public function getStatistics(?User $user = null): array
>>>>>>> .merge_file_vurhrf
    {
        return app(GetActivityStatisticsAction::class)->execute($user);
    }
}
