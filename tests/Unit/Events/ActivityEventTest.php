<?php

declare(strict_types=1);

use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Activity\Events\ActivityEvent;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('ActivityEvent can be instantiated', function () {
    $event = new ActivityEvent;

    Assert::assertInstanceOf(ActivityEvent::class, $event);
});

test('ActivityEvent has expected properties', function () {
    $event = new ActivityEvent;

    Assert::assertInstanceOf(Dispatchable::class, $event);
    Assert::assertInstanceOf(SerializesModels::class, $event);
    Assert::assertInstanceOf(ShouldBroadcastNow::class, $event);
});
