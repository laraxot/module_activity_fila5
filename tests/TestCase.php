<?php

declare(strict_types=1);

namespace Modules\Activity\Tests;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\ServiceProvider;
use Modules\Activity\Providers\ActivityServiceProvider;
use Modules\Activity\Providers\EventServiceProvider;
use Modules\Fixcity\Models\User;
use Modules\User\Providers\UserServiceProvider;
use Modules\Xot\Tests\XotBaseTestCase;

/**
 * Base test case for Activity module.
 *
 * Uses shared fixcity_data.sqlite (no RefreshDatabase / migrate:fresh).
 * prepareSharedFixcitySqliteForTesting() runs before transactions begin.
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

    /** @var list<string> */
    protected $connectionsToTransact = ['sqlite'];

    protected function setUp(): void
    {
        $this->prepareSharedFixcitySqliteForTesting();

        parent::setUp();

        config(['auth.providers.users.model' => User::class]);
    }

    /**
     * @return array<int, class-string<ServiceProvider>>
     */
    protected function getPackageProviders(Application $app): array
    {
        return [
            ...parent::getPackageProviders($app),
            UserServiceProvider::class,
            ActivityServiceProvider::class,
            EventServiceProvider::class,
        ];
    }
}
