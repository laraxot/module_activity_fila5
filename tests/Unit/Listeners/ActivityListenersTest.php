<?php

declare(strict_types=1);

use Modules\Activity\Listeners\LoginListener;
use Modules\Activity\Listeners\LogoutListener;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(\Modules\Activity\Tests\TestCase::class);

test('LoginListener can be instantiated', function () {
    $listener = new LoginListener();
=======
uses(TestCase::class);

test('LoginListener can be instantiated', function () {
    $listener = new LoginListener;
>>>>>>> 3cbe4341 (.)

    Assert::assertInstanceOf(LoginListener::class, $listener);
});

test('LogoutListener can be instantiated', function () {
<<<<<<< HEAD
    $listener = new LogoutListener();
=======
    $listener = new LogoutListener;
>>>>>>> 3cbe4341 (.)

    Assert::assertInstanceOf(LogoutListener::class, $listener);
});
