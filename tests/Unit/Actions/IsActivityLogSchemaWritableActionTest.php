<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Activity\Actions\Schema\IsActivityLogSchemaWritableAction;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

it('returns false when activity log is disabled', function (): void {
    config(['activitylog.enabled' => false]);

    Assert::assertFalse(app(IsActivityLogSchemaWritableAction::class)->execute());
});

it('returns false when table mancante', function (): void {
    config([
        'activitylog.enabled' => true,
        'activitylog.database_connection' => 'activity',
        'activitylog.table_name' => 'activity_log_missing_xyz',
    ]);

    Assert::assertFalse(app(IsActivityLogSchemaWritableAction::class)->execute());
});

it('returns false when manca attribute_changes', function (): void {
    $table = 'activity_log_no_attr_changes';
    Schema::connection('activity')->dropIfExists($table);
    Schema::connection('activity')->create($table, static function (Blueprint $blueprint): void {
        $blueprint->id();
        $blueprint->string('description')->nullable();
    });

    config([
        'activitylog.enabled' => true,
        'activitylog.database_connection' => 'activity',
        'activitylog.table_name' => $table,
    ]);

    Assert::assertFalse(app(IsActivityLogSchemaWritableAction::class)->execute());

    Schema::connection('activity')->dropIfExists($table);
});

it('usa default connection e table quando config vuota e ritorna true', function (): void {
    /** @var TestCase $this */
    $this->ensureActivityLogSchema();

    config([
        'activitylog.enabled' => true,
        'activitylog.database_connection' => '',
        'activitylog.table_name' => '',
        'database.default' => 'activity',
    ]);

    Assert::assertTrue(app(IsActivityLogSchemaWritableAction::class)->execute());
});

it('usa mysql quando default non stringa e table assente', function (): void {
    config([
        'activitylog.enabled' => true,
        'activitylog.database_connection' => 'activity',
        'activitylog.table_name' => 'still_missing_abc',
        'database.default' => ['not' => 'string'],
    ]);

    Assert::assertFalse(app(IsActivityLogSchemaWritableAction::class)->execute());
});
