<?php

declare(strict_types=1);
<<<<<<< HEAD
=======

>>>>>>> laraxot/dev
use Modules\Activity\Listeners\LoginListener;
use Modules\Activity\Listeners\LogoutListener;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);

test('LoginListener can be instantiated', function () {
    $listener = new LoginListener;
=======
uses(\Modules\Activity\Tests\TestCase::class);

test('LoginListener can be instantiated', function () {
    $listener = new LoginListener();
>>>>>>> laraxot/dev

    Assert::assertInstanceOf(LoginListener::class, $listener);
});

test('LogoutListener can be instantiated', function () {
<<<<<<< HEAD
    $listener = new LogoutListener;
=======
    $listener = new LogoutListener();
>>>>>>> laraxot/dev

    Assert::assertInstanceOf(LogoutListener::class, $listener);
});
