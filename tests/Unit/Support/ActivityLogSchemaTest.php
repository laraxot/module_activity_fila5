<?php

declare(strict_types=1);
<<<<<<< .merge_file_5d9r2m
use Modules\Activity\Actions\Schema\IsActivityLogSchemaWritableAction;
=======
<<<<<<< .merge_file_h6MrLL

use Modules\Activity\Support\ActivityLogSchema;
=======
use Modules\Activity\Actions\Schema\IsActivityLogSchemaWritableAction;
>>>>>>> .merge_file_m06Afi
>>>>>>> .merge_file_pBlr5Z
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Activity\Tests\TestCase::class);

test('returns false when activity log is disabled', function (): void {
    config(['activitylog.enabled' => false]);

    Assert::assertFalse(app(IsActivityLogSchemaWritableAction::class)->execute());
});
