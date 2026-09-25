<?php

declare(strict_types=1);

<<<<<<< HEAD
use Modules\Activity\Actions\Schema\IsActivityLogSchemaWritableAction;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
=======
use Modules\Activity\Support\ActivityLogSchema;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Activity\Tests\TestCase::class);
>>>>>>> laraxot/dev

test('returns false when activity log is disabled', function (): void {
    config(['activitylog.enabled' => false]);

<<<<<<< HEAD
    Assert::assertFalse(app(IsActivityLogSchemaWritableAction::class)->execute());
=======
    Assert::assertFalse(ActivityLogSchema::isWritable());
>>>>>>> laraxot/dev
});
