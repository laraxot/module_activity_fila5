<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_inA46j

=======
>>>>>>> .merge_file_rgyXMb
=======

>>>>>>> a95e8f36 (.)
use Modules\Activity\Actions\Schema\IsActivityLogSchemaWritableAction;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
<<<<<<< .merge_file_inA46j
uses(\Modules\Activity\Tests\TestCase::class);
=======
uses(TestCase::class);
>>>>>>> .merge_file_rgyXMb
=======
uses(\Modules\Activity\Tests\TestCase::class);
>>>>>>> a95e8f36 (.)

it('returns false when activity log is disabled', function (): void {
    config(['activitylog.enabled' => false]);

    Assert::assertFalse(app(IsActivityLogSchemaWritableAction::class)->execute());
});
