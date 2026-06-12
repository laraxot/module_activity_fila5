<?php

declare(strict_types=1);

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Event;
use Modules\Activity\Listeners\LogoutListener;
use Modules\Activity\Tests\TestCase;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;
use ReflectionNamedType;

uses(TestCase::class);

test('logout listener is registered for logout event', function () {
    Event::fake();

    Event::assertListening(
        Logout::class,
        LogoutListener::class
    );
});

test('logout listener can be instantiated', function () {
    $listener = new LogoutListener;

    Assert::assertInstanceOf(LogoutListener::class, $listener);
});

test('logout listener has handle method', function () {
    $listener = new LogoutListener;
    $reflection = new ReflectionClass($listener);

    Assert::assertTrue($reflection->hasMethod('handle'));
});

test('logout listener handle method accepts logout event', function () {
    $listener = new LogoutListener;
    $reflection = new ReflectionClass($listener);
    $method = $reflection->getMethod('handle');
    $parameters = $method->getParameters();

    Assert::assertCount(1, $parameters);
    $parameterType = $parameters[0]->getType();
    Assert::assertInstanceOf(ReflectionNamedType::class, $parameterType);
    Assert::assertSame(Logout::class, $parameterType->getName());
});

test('logout listener handles event without user gracefully', function () {
    $user = new User;
    $user->exists = true;
    $event = new Logout('web', $user);
    (new ReflectionClass(Logout::class))->getProperty('user')->setValue($event, null);

    $listener = new LogoutListener;
    $listener->handle($event);
});
