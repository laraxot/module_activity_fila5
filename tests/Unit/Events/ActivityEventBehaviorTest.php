<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Events;

use Modules\Activity\Events\ActivityEvent;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);
=======
uses(\Modules\Activity\Tests\TestCase::class);
>>>>>>> laraxot/dev

test('activity event can be constructed and dispatched', function (): void {
    $event = new ActivityEvent;

    Assert::assertInstanceOf(ActivityEvent::class, $event);

    ActivityEvent::dispatch();
});
