<?php

declare(strict_types=1);

<<<<<<< HEAD
use Modules\Activity\Support\ActivityLogSchema;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Activity\Tests\TestCase::class);
=======
use Modules\Activity\Actions\Schema\IsActivityLogSchemaWritableAction;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
>>>>>>> 3cbe4341 (.)

test('returns false when activity log is disabled', function (): void {
    config(['activitylog.enabled' => false]);

<<<<<<< HEAD
    Assert::assertFalse(ActivityLogSchema::isWritable());
=======
    Assert::assertFalse(app(IsActivityLogSchemaWritableAction::class)->execute());
>>>>>>> 3cbe4341 (.)
});
