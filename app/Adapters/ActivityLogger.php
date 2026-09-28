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
use Modules\Xot\Contracts\UserContract;
=======
use Modules\User\Models\User;
>>>>>>> laraxot/dev

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
        if ($user !== null && (! $user instanceof UserContract || ! $user instanceof Model)) {
            throw new InvalidArgumentException('User must implement UserContract');
=======
        if ($user !== null && ! $user instanceof User) {
            throw new InvalidArgumentException('User must be an instance of User');
>>>>>>> laraxot/dev
        }

        $activity = (new LogActivityAction(
            type: $type,
<<<<<<< HEAD
            user: $user instanceof Model ? $user : null,
=======
            user: $user instanceof User ? $user : null,
>>>>>>> laraxot/dev
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
=======
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
>>>>>>> laraxot/dev
    {
        return (new LogUserLoginAction($user))->execute();
    }

<<<<<<< HEAD
    public function logout(UserContract $user): Activity
=======
    public function logout(User $user): Activity
>>>>>>> laraxot/dev
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
    public function getUserActivities(UserContract $user, int $limit = 50): Collection
=======
    public function getUserActivities(User $user, int $limit = 50): Collection
>>>>>>> laraxot/dev
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
    public function getStatistics(?UserContract $user = null): array
=======
    public function getStatistics(?User $user = null): array
>>>>>>> laraxot/dev
    {
        return app(GetActivityStatisticsAction::class)->execute($user);
    }
}
