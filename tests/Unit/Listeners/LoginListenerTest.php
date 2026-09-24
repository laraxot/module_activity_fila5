<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> a95e8f36 (.)
use Illuminate\Auth\Events\Login;
use Modules\Activity\Listeners\LoginListener;
use Modules\Activity\Providers\EventServiceProvider;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);
=======
uses(\Modules\Activity\Tests\TestCase::class);
>>>>>>> a95e8f36 (.)

test('login listener is registered for login event', function () {
    $reflection = new ReflectionClass(EventServiceProvider::class);
    /** @var array<class-string, list<class-string>> $listen */
    $listen = $reflection->getDefaultProperties()['listen'] ?? [];
    /** @var list<class-string> $handlers */
    $handlers = $listen[Login::class] ?? [];

    Assert::assertContains(LoginListener::class, $handlers);
});

test('login listener can be instantiated', function () {
<<<<<<< HEAD
    $listener = new LoginListener;
=======
    $listener = new LoginListener();
>>>>>>> a95e8f36 (.)

    Assert::assertInstanceOf(LoginListener::class, $listener);
});

test('login listener has handle method', function () {
<<<<<<< HEAD
    $listener = new LoginListener;
=======
    $listener = new LoginListener();
>>>>>>> a95e8f36 (.)
    $reflection = new ReflectionClass($listener);

    Assert::assertTrue($reflection->hasMethod('handle'));
});

test('login listener handle method is callable', function () {
<<<<<<< HEAD
    $listener = new LoginListener;
=======
    $listener = new LoginListener();
>>>>>>> a95e8f36 (.)

    $listener->handle();
});
