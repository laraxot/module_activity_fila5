<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

use Modules\Activity\Listeners\LogoutListener;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(\Modules\Activity\Tests\TestCase::class);

describe('Logout Listener', function (): void {
    test('listener class exists', function (): void {
Assert::assertTrue(class_exists(LogoutListener::class));
    });

    test('listener has handle method', function (): void {
$listener = new LogoutListener;
=======
uses(TestCase::class);

describe('Logout Listener', function (): void {
    test('listener class exists', function (): void {
        Assert::assertTrue(class_exists(LogoutListener::class));
    });

    test('listener has handle method', function (): void {
        $listener = new LogoutListener;
>>>>>>> laraxot/dev
        $reflection = new \ReflectionClass($listener);

        Assert::assertTrue($reflection->hasMethod('handle'));
    });
});
