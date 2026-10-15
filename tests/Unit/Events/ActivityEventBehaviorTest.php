<?php

declare(strict_types=1);

namespace Tests\Modules\Activity\Unit\Events;

use Modules\Activity\Events\ActivityEvent;
use Tests\Modules\Activity\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('activity event can be constructed and dispatched', function (): void {
    $event = new ActivityEvent;

    Assert::assertInstanceOf(ActivityEvent::class, $event);

    ActivityEvent::dispatch();
});
