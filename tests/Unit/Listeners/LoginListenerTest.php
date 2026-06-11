<?php

declare(strict_types=1);

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Event;
use Modules\Activity\Listeners\LoginListener;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;
use ReflectionClass;

uses(TestCase::class);

test('login listener is registered for login event', function () {
    Event::fake();

    Event::assertListening(
        Login::class,
        LoginListener::class
    );
});

test('login listener can be instantiated', function () {
    $listener = new LoginListener;

    Assert::assertInstanceOf(LoginListener::class, $listener);
});

test('login listener has handle method', function () {
    $listener = new LoginListener;
    $reflection = new ReflectionClass($listener);

    Assert::assertTrue($reflection->hasMethod('handle'));
});

test('login listener handle method is callable', function () {
    $listener = new LoginListener;

    $listener->handle();
});
