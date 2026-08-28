<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

use Modules\Activity\Models\Snapshot;
use PHPUnit\Framework\Assert;

test('snapshot uses activity module connection', function (): void {
    $model = new Snapshot();

    Assert::assertSame('activity', $model->getConnectionName());
});
