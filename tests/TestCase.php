<?php

declare(strict_types=1);

namespace Modules\Activity\Tests;

use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Modules\Activity\Filament\Pages\ListLogActivities;
use Modules\Activity\Providers\ActivityServiceProvider;
use Modules\Activity\Providers\EventServiceProvider;
use Modules\User\Models\User;
use Modules\User\Providers\UserServiceProvider;
use Modules\Xot\Tests\XotBaseTestCase;

use function Safe\file_get_contents;
use function Safe\touch;

/**
 * Base test case for Activity module.
 *
 * Uses shared fixcity_data.sqlite (no RefreshDatabase / migrate:fresh).
 * prepareSharedFixcitySqliteForTesting() runs before transactions begin.
 *
 * Feature: skip salvo gruppo `activity-db` (opt-in).
 * Unit `activity-db`: crea schema `activity_log` locale se assente.
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
        $this->forceActivityConnectionOntoSharedSqlite();
        $this->prepareSharedFixcitySqliteForTesting();

        parent::setUp();

        config(['auth.providers.users.model' => User::class]);

        $testFile = $this->resolvePestTestFile();
        $isUnit = $testFile !== null && str_contains($testFile, '/tests/Unit/');

        if ($isUnit && $this->hasTestGroup('activity-db')) {
            $this->ensureActivityLogSchema();
        }

        if ($this->shouldSkipForMissingActivityDb()) {
            $this->markTestSkipped('DB `activity_log` non disponibile in ambiente test condiviso.');
        }
    }

    /**
     * Isola `activity` + `user` su sqlite dedicato (evita lock/timeout MySQL).
     */
    protected function forceActivityConnectionOntoSharedSqlite(): void
    {
        if ($this->app === null) {
            $this->refreshApplication();
        }

        $database = database_path('activity_module_test.sqlite');
        if (! is_file($database)) {
            touch($database);
        }

        $sqliteConfig = [
            'driver' => 'sqlite',
            'database' => $database,
            'prefix' => '',
            'foreign_key_constraints' => true,
            'busy_timeout' => 10000,
        ];

        $this->app['config']->set('database.connections.activity', $sqliteConfig);
        $this->app['config']->set('database.connections.user', $sqliteConfig);

        DB::purge('activity');
        DB::purge('user');
    }

    /**
     * Dopo il remap Xot, re-isola `activity`/`user` sul file dedicato (PDO condiviso tra i due).
     */
    protected function prepareSharedFixcitySqliteForTesting(): void
    {
        parent::prepareSharedFixcitySqliteForTesting();

        $database = database_path('activity_module_test.sqlite');
        if (! is_file($database)) {
            touch($database);
        }

        foreach (['activity', 'user'] as $connection) {
            $this->app['config']->set("database.connections.{$connection}.driver", 'sqlite');
            $this->app['config']->set("database.connections.{$connection}.database", $database);
            $this->app['config']->set("database.connections.{$connection}.busy_timeout", 10000);
            DB::purge($connection);
        }

        $databaseManager = $this->app->make(DatabaseManager::class);
        $reflection = new \ReflectionClass($databaseManager);
        $connectionsProperty = $reflection->getProperty('connections');
        $connectionsProperty->setAccessible(true);
        $resolved = $connectionsProperty->getValue($databaseManager);
        if (! is_array($resolved)) {
            throw new \UnexpectedValueException('Database manager connections must be an array.');
        }
        unset($resolved['activity'], $resolved['user']);
        $connectionsProperty->setValue($databaseManager, $resolved);

        $primary = $databaseManager->connection('activity');
        $resolved = $connectionsProperty->getValue($databaseManager);
        if (! is_array($resolved)) {
            throw new \UnexpectedValueException('Database manager connections must be an array.');
        }
        $resolved['activity'] = $primary;
        $resolved['user'] = $primary;
        $connectionsProperty->setValue($databaseManager, $resolved);
    }

    /**
     * Crea `activity_log` sul sqlite condiviso (idempotente). Nessun migrate:fresh.
     */
    public function ensureActivityLogSchema(): void
    {
        if (! Schema::connection('activity')->hasTable('activity_log')) {
            Schema::connection('activity')->create('activity_log', static function (Blueprint $table): void {
                $table->bigIncrements('id');
                $table->string('log_name')->nullable();
                $table->text('description');
                $table->string('subject_type')->nullable();
                $table->string('subject_id', 36)->nullable();
                $table->string('causer_type')->nullable();
                $table->string('causer_id', 36)->nullable();
                $table->json('properties')->nullable();
                $table->json('attribute_changes')->nullable();
                $table->uuid('batch_uuid')->nullable();
                $table->string('event')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        } elseif (! Schema::connection('activity')->hasColumn('activity_log', 'attribute_changes')) {
            Schema::connection('activity')->table('activity_log', static function (Blueprint $table): void {
                $table->json('attribute_changes')->nullable();
            });
        }

        // Tabelle stub per eager-load morph (subject/causer) sullo stesso sqlite activity
        if (! Schema::connection('activity')->hasTable('test_models')) {
            Schema::connection('activity')->create('test_models', static function (Blueprint $table): void {
                $table->string('id')->primary();
                $table->string('name')->nullable();
            });
        }

        if (Schema::connection('activity')->hasTable('users')
            && ! Schema::connection('activity')->hasColumn('users', 'is_active')
        ) {
            Schema::connection('activity')->drop('users');
        }

        if (! Schema::connection('activity')->hasTable('users')) {
            Schema::connection('activity')->create('users', static function (Blueprint $table): void {
                $table->uuid('id')->primary();
                $table->string('name')->nullable();
                $table->string('email')->nullable();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password')->nullable();
                $table->string('remember_token')->nullable();
                $table->string('lang')->nullable();
                $table->string('type')->nullable();
                $table->string('state')->nullable();
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        if (! Schema::connection('activity')->hasTable('activity_subject_harness')) {
            Schema::connection('activity')->create('activity_subject_harness', static function (Blueprint $table): void {
                $table->string('id')->primary();
                $table->string('name')->nullable();
            });
        }

    }

    /**
     * Salta Feature (e non-Unit) salvo `activity-db` / `no-activity-db`.
     * Unit: esegue; `activity-db` Unit richiede schema (creato in setUp).
     */
    protected function shouldSkipForMissingActivityDb(): bool
    {
        if ($this->hasTestGroup('no-activity-db')) {
            return false;
        }

        $testFile = $this->resolvePestTestFile();
        $isUnit = $testFile !== null && str_contains($testFile, '/tests/Unit/');

        if ($isUnit) {
            if ($this->hasTestGroup('activity-db')) {
                return static::activityDbUnavailable();
            }

            return false;
        }

        // Feature / Security / altro: solo opt-in activity-db
        if ($this->hasTestGroup('activity-db')) {
            return static::activityDbUnavailable();
        }

        return true;
    }

    private function resolvePestTestFile(): ?string
    {
        $class = static::class;

        if (property_exists($class, '__filename')) {
            /** @var string $filename */
            $filename = $class::$__filename;

            return $filename;
        }

        $file = (new \ReflectionClass($this))->getFileName();

        return $file !== false ? $file : null;
    }

    private function hasTestGroup(string $group): bool
    {
        $testFile = $this->resolvePestTestFile();
        if ($testFile === null || ! is_file($testFile)) {
            return false;
        }

        $source = file_get_contents($testFile);

        return str_contains($source, "group('{$group}')")
            || str_contains($source, 'group("'.$group.'")');
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
