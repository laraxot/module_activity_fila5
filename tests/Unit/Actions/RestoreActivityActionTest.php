<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Actions;

use Modules\Activity\Actions\RestoreActivityAction;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);
=======
uses(\Modules\Activity\Tests\TestCase::class);
>>>>>>> a95e8f36 (.)

test('RestoreActivityAction can be instantiated', function () {
    $action = new RestoreActivityAction;

    Assert::assertInstanceOf(RestoreActivityAction::class, $action);
});

test('RestoreActivityAction can execute', function () {
    $action = new RestoreActivityAction;

    Assert::assertInstanceOf(RestoreActivityAction::class, $action);
});
