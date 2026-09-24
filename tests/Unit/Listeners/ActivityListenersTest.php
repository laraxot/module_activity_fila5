<?php

declare(strict_types=1);
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======

>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev
use Modules\Activity\Listeners\LoginListener;
use Modules\Activity\Listeners\LogoutListener;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> laraxot/dev
uses(TestCase::class);

test('LoginListener can be instantiated', function () {
    $listener = new LoginListener;
<<<<<<< HEAD
=======
=======
uses(\Modules\Activity\Tests\TestCase::class);

test('LoginListener can be instantiated', function () {
    $listener = new LoginListener();
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev

    Assert::assertInstanceOf(LoginListener::class, $listener);
});

test('LogoutListener can be instantiated', function () {
<<<<<<< HEAD
    $listener = new LogoutListener;
=======
<<<<<<< HEAD
    $listener = new LogoutListener;
=======
    $listener = new LogoutListener();
>>>>>>> a95e8f36 (.)
>>>>>>> laraxot/dev

    Assert::assertInstanceOf(LogoutListener::class, $listener);
});
