<?php

declare(strict_types=1);

namespace Modules\Activity\Actions\Query;

use Illuminate\Database\Eloquent\Builder;
<<<<<<< HEAD
=======
use Illuminate\Support\Collection;
>>>>>>> laraxot/dev
use Illuminate\Support\Facades\Cache;
use Modules\Activity\Models\Activity;
use Modules\User\Models\User;
use Spatie\QueueableAction\QueueableAction;

/**
 * Get activity statistics, cached 5 minutes.
 */
class GetActivityStatisticsAction
{
    use QueueableAction;

    /**
     * @return array{total: int, by_type: array<string, int>, today: int, this_week: int, this_month: int}
     */
    public function execute(?User $user = null): array
    {
        $userKey = $user?->getKey();
<<<<<<< HEAD
        $cacheKeySuffix = match (true) {
            is_int($userKey) => (string) $userKey,
            is_string($userKey) && $userKey !== '' => $userKey,
            default => 'global',
        };
        $cacheKey = 'activity.statistics.'.$cacheKeySuffix;

        return Cache::remember($cacheKey, now()->addMinutes(5), function () use ($user): array {
            return $this->computeStatistics($user);
        });
=======
        $cacheKeySuffix = is_scalar($userKey) ? (string) $userKey : 'global';
        $cacheKey = 'activity.statistics.'.$cacheKeySuffix;

        /** @var array{total: int, by_type: array<string, int>, today: int, this_week: int, this_month: int} $stats */
        $stats = Cache::remember($cacheKey, now()->addMinutes(5), function () use ($user): array {
            return $this->computeStatistics($user);
        });

        return $stats;
>>>>>>> laraxot/dev
    }

    /**
     * @return array{total: int, by_type: array<string, int>, today: int, this_week: int, this_month: int}
     */
    private function computeStatistics(?User $user): array
    {
<<<<<<< HEAD
=======
        /** @var Builder<Activity> $query */
>>>>>>> laraxot/dev
        $query = Activity::newQuery();

        if ($user) {
            $query->where('causer_id', $user->getKey())
                ->where('causer_type', $user::class);
        }

        return [
            'total' => $query->count(),
            'by_type' => $this->countByType($query),
            'today' => $query->clone()
                ->whereDate('created_at', now()->toDateString())
                ->count(),
            'this_week' => $query->clone()
                ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                ->count(),
            'this_month' => $query->clone()
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count(),
        ];
    }

    /**
     * @param  Builder<Activity>  $query
     * @return array<string, int>
     */
    private function countByType(Builder $query): array
    {
<<<<<<< HEAD
        $results = $query->clone()
=======
        /** @var Builder<Activity> $clonedQuery */
        $clonedQuery = $query->clone();

        /** @var Collection<int, object{event: string, count: int}> $results */
        $results = $clonedQuery
>>>>>>> laraxot/dev
            ->selectRaw('event, COUNT(*) as count')
            ->groupBy('event')
            ->get();

<<<<<<< HEAD
        $byType = [];
        foreach ($results as $activity) {
            $event = $activity->getAttribute('event');
            $count = $activity->getAttribute('count');

            if (! is_string($event) || $event === '') {
                continue;
            }

            if (! is_int($count) && ! (is_string($count) && ctype_digit($count))) {
                continue;
            }

            $byType[$event] = (int) $count;
        }
=======
        /** @var array<string, int> $byType */
        $byType = $results->mapWithKeys(function (object $item): array {
            // PHPStan L10: isset() per magic attributes invece di property_exists()
            if (! isset($item->event, $item->count)) {
                return [];
            }

            return [(string) $item->event => (int) $item->count];
        })->toArray();
>>>>>>> laraxot/dev

        return $byType;
    }
}
