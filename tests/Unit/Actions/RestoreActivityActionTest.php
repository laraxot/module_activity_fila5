<?php

declare(strict_types=1);

namespace Tests\Modules\Activity\Unit\Actions;

use Modules\Activity\Actions\RestoreActivityAction;
use Tests\Modules\Activity\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('RestoreActivityAction can be instantiated', function () {
    $action = new RestoreActivityAction;

    Assert::assertInstanceOf(RestoreActivityAction::class, $action);
});

test('RestoreActivityAction can execute', function () {
    $action = new RestoreActivityAction;

    Assert::assertInstanceOf(RestoreActivityAction::class, $action);
});
