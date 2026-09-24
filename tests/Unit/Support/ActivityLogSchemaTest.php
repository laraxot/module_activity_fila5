<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> a95e8f36 (.)
use Modules\Activity\Support\ActivityLogSchema;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);
=======
uses(\Modules\Activity\Tests\TestCase::class);
>>>>>>> a95e8f36 (.)

test('returns false when activity log is disabled', function (): void {
    config(['activitylog.enabled' => false]);

    Assert::assertFalse(ActivityLogSchema::isWritable());
});
