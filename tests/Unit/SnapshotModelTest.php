<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

use Modules\Activity\Models\Snapshot;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);
=======
uses(\Modules\Activity\Tests\TestCase::class);
>>>>>>> a95e8f36 (.)

test('snapshot uses activity module connection', function (): void {
    $model = new Snapshot;

    Assert::assertSame('activity', $model->getConnectionName());
});
