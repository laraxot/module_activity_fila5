<?php

declare(strict_types=1);

use Modules\Activity\Actions\Schema\IsActivityLogSchemaWritableAction;
use PHPUnit\Framework\Assert;

<<<<<<< .merge_file_uMp7Jd
uses(Modules\Activity\Tests\TestCase::class);
=======
uses(\Modules\Activity\Tests\TestCase::class);
>>>>>>> .merge_file_8gq8ZC

it('returns false when activity log is disabled', function (): void {
    config(['activitylog.enabled' => false]);

    Assert::assertFalse(app(IsActivityLogSchemaWritableAction::class)->execute());
});
