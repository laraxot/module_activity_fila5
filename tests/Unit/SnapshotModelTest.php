<?php

declare(strict_types=1);

namespace Tests\Modules\Activity\Unit;

use Modules\Activity\Models\Snapshot;
use Tests\Modules\Activity\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('snapshot uses activity module connection', function (): void {
    $model = new Snapshot;

    Assert::assertSame('activity', $model->getConnectionName());
});
