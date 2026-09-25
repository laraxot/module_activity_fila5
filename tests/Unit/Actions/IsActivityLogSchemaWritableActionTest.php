<?php

declare(strict_types=1);

use Modules\Activity\Actions\Schema\IsActivityLogSchemaWritableAction;
<<<<<<< HEAD
use PHPUnit\Framework\Assert;

uses(Modules\Activity\Tests\TestCase::class);
=======
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Activity\Tests\TestCase::class);
>>>>>>> laraxot/dev

it('returns false when activity log is disabled', function (): void {
    config(['activitylog.enabled' => false]);

    Assert::assertFalse(app(IsActivityLogSchemaWritableAction::class)->execute());
});
