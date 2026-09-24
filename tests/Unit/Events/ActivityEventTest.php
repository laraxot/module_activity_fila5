<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> a95e8f36 (.)
use Modules\Activity\Events\ActivityEvent;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);
=======
uses(\Modules\Activity\Tests\TestCase::class);
>>>>>>> a95e8f36 (.)

test('ActivityEvent uses expected Laravel event traits', function () {
    $event = new ActivityEvent;

    $traitNames = (new ReflectionClass($event))->getTraitNames();
    Assert::assertContains('Illuminate\Broadcasting\InteractsWithSockets', $traitNames);
    Assert::assertContains('Illuminate\Foundation\Events\Dispatchable', $traitNames);
    Assert::assertContains('Illuminate\Queue\SerializesModels', $traitNames);
});
