<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Support;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Activity\Support\ActivityLogSchema;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('ActivityLogSchema ritorna false quando activitylog è disabilitato', function (): void {
    config(['activitylog.enabled' => false]);

    Assert::assertFalse(ActivityLogSchema::isWritable());
});

test('ActivityLogSchema ritorna false senza tabella', function (): void {
    config([
        'activitylog.enabled' => true,
        'activitylog.database_connection' => 'activity',
        'activitylog.table_name' => 'activity_log_schema_missing',
    ]);

    Assert::assertFalse(ActivityLogSchema::isWritable());
});

test('ActivityLogSchema ritorna false senza colonna attribute_changes', function (): void {
    $table = 'activity_log_schema_no_attr';
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

    Assert::assertFalse(ActivityLogSchema::isWritable());

    Schema::connection('activity')->dropIfExists($table);
});

test('ActivityLogSchema usa fallback connection e table name', function (): void {
    /** @var TestCase $this */
    $this->ensureActivityLogSchema();

    config([
        'activitylog.enabled' => true,
        'activitylog.database_connection' => null,
        'database.default' => 'activity',
        'activitylog.table_name' => '',
    ]);

    Assert::assertTrue(ActivityLogSchema::isWritable());
});
