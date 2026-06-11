<?php

declare(strict_types=1);

namespace Modules\Activity\Tests;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\ServiceProvider;
use Modules\Activity\Providers\ActivityServiceProvider;
use Modules\User\Providers\UserServiceProvider;
use Modules\Xot\Tests\XotBaseTestCase;

/**
 * Base test case for Activity module.
 *
 * Uses MySQL from .env.testing (carbon copy of .env with _test DB names).
 * All module connections are mapped dynamically by TenantServiceProvider.
 * Migrations must be run ONCE externally: php artisan migrate --env=testing
 * DatabaseTransactions handles rollback between tests.
 */
abstract class TestCase extends XotBaseTestCase
{
    use DatabaseTransactions;

    /**
     * Shared test data for Activity entity.
     *
     * @var array<string, mixed>
     */
    public array $activityData = [];

    /**
     * Shared test data for stored event entity.
     *
     * @var array<string, mixed>
     */
    public array $storedEventData = [];

    /**
     * Shared test data for snapshot entity.
     *
     * @var array<string, mixed>
     */
    public array $snapshotData = [];

    public ?Model $model = null;

    /**
     * Connections to wrap in transactions for automatic rollback.
     * MANDATORY: must include every connection used by this module's models.
     * Activity models use $connection = 'activity' (separate PDO handle).
     * Without this, Activity data is NEVER rolled back between tests.
     *
     * @var array<int, string>
     */
    protected $connectionsToTransact = [
        'mysql',
        'activity',
        'user',
    ];

    /**
     * @return array<int, class-string<ServiceProvider>>
     */
    protected function getPackageProviders(Application $app): array
    {
        return [
            ...parent::getPackageProviders($app),
            UserServiceProvider::class,
            ActivityServiceProvider::class,
        ];
    }
}
