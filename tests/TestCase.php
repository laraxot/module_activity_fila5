<?php

declare(strict_types=1);

namespace Modules\Activity\Tests;

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Modules\Activity\Filament\Pages\ListLogActivities;
use Modules\Activity\Providers\ActivityServiceProvider;
use Modules\Activity\Providers\EventServiceProvider;
use Modules\User\Models\User;
use Modules\User\Providers\UserServiceProvider;
use Modules\Xot\Tests\XotBaseTestCase;

/**
 * Base test case for Activity module.
 *
 * Uses shared fixcity_data.sqlite (no RefreshDatabase / migrate:fresh).
 * prepareSharedFixcitySqliteForTesting() runs before transactions begin.
 *
 * @property ListLogActivities|null $page
 */
abstract class TestCase extends XotBaseTestCase
{
    use DatabaseTransactions;

    public ?ListLogActivities $page = null;

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

    /** @var list<string> */
    protected $connectionsToTransact = ['sqlite', 'activity', 'user'];

    protected function setUp(): void
    {
        $this->prepareSharedFixcitySqliteForTesting();

        parent::setUp();

        config(['auth.providers.users.model' => User::class]);

        if ($this->shouldSkipForMissingActivityDb()) {
            $this->markTestSkipped('DB `activity_log` non disponibile in ambiente test condiviso.');
        }
    }

    /**
     * Salta solo test Feature (o marcati `activity-db`) quando manca `activity_log`.
     * I test Unit girano senza DB salvo gruppo esplicito `activity-db`.
     */
    protected function shouldSkipForMissingActivityDb(): bool
    {
        if (in_array('no-activity-db', $this->groups(), true)) {
            return false;
        }

        if (! static::activityDbUnavailable()) {
            return false;
        }

        if (in_array('activity-db', $this->groups(), true)) {
            return true;
        }

        $file = (new \ReflectionClass($this))->getFileName();

        return str_contains($file, '/tests/Feature/');
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

    public function requirePage(): ListLogActivities
    {
        if ($this->page === null) {
            $this->fail('ListLogActivities page is not initialized.');
        }

        return $this->page;
    }

    /**
     * Il sqlite condiviso non contiene sempre `activity_log`: i test DB vanno saltati, non falliti.
     */
    public static function activityDbUnavailable(): bool
    {
        try {
            DB::connection('activity')->getPdo();

            return ! DB::connection('activity')->getSchemaBuilder()->hasTable('activity_log');
        } catch (\Throwable) {
            return true;
        }
    }
}
