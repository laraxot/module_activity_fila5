<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Events;

use Modules\Activity\Events\ActivityEvent;
use PHPUnit\Framework\Assert;

test('activity event can be constructed and dispatched', function (): void {
    $event = new ActivityEvent();

    Assert::assertInstanceOf(ActivityEvent::class, $event);

    ActivityEvent::dispatch();
});
