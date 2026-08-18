<?php

declare(strict_types=1);

use Modules\Activity\Actions\Schema\IsActivityLogSchemaWritableAction;
<<<<<<< HEAD
<<<<<<< HEAD
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);
=======
use PHPUnit\Framework\Assert;

uses(Modules\Activity\Tests\TestCase::class);
>>>>>>> 0a02158a (.)
=======
use PHPUnit\Framework\Assert;

uses(Modules\Activity\Tests\TestCase::class);
>>>>>>> 35d8cf69 (Initial commit)

it('returns false when activity log is disabled', function (): void {
    config(['activitylog.enabled' => false]);

    Assert::assertFalse(app(IsActivityLogSchemaWritableAction::class)->execute());
});
