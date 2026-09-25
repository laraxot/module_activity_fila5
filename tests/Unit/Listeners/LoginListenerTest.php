<?php

declare(strict_types=1);

<<<<<<< HEAD
use Illuminate\Auth\Events\Login;
use Modules\Activity\Listeners\LoginListener;
use Modules\Activity\Providers\EventServiceProvider;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Activity\Tests\TestCase::class);

test('login listener is registered for login event', function () {
    $reflection = new ReflectionClass(EventServiceProvider::class);
    /** @var array<class-string, list<class-string>> $listen */
    $listen = $reflection->getDefaultProperties()['listen'] ?? [];
    /** @var list<class-string> $handlers */
    $handlers = $listen[Login::class] ?? [];
=======
namespace Modules\Activity\Tests\Unit\Listeners;

use Illuminate\Auth\Events\Login;
use Modules\Activity\Providers\EventServiceProvider;
use Modules\Activity\Listeners\LoginListener;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;
use ReflectionClass;

uses(TestCase::class);

test('login listener is registered for login event', function () {
    $reflection = new ReflectionClass(EventServiceProvider::class);
    $properties = $reflection->getDefaultProperties();
    $listen = $properties['listen'] ?? null;
    Assert::assertIsArray($listen);
    $handlers = $listen[Login::class] ?? [];
    Assert::assertIsArray($handlers);
>>>>>>> 3cbe4341 (.)

    Assert::assertContains(LoginListener::class, $handlers);
});

test('login listener can be instantiated', function () {
<<<<<<< HEAD
    $listener = new LoginListener();
=======
    $listener = new LoginListener;
>>>>>>> 3cbe4341 (.)

    Assert::assertInstanceOf(LoginListener::class, $listener);
});

test('login listener has handle method', function () {
<<<<<<< HEAD
    $listener = new LoginListener();
=======
    $listener = new LoginListener;
>>>>>>> 3cbe4341 (.)
    $reflection = new ReflectionClass($listener);

    Assert::assertTrue($reflection->hasMethod('handle'));
});

test('login listener handle method is callable', function () {
<<<<<<< HEAD
    $listener = new LoginListener();
=======
    $listener = new LoginListener;
>>>>>>> 3cbe4341 (.)

    $listener->handle();
});
