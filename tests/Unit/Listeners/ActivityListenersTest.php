<?php

declare(strict_types=1);

use Modules\Activity\Listeners\LoginListener;
use Modules\Activity\Listeners\LogoutListener;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('LoginListener can be instantiated', function () {
<<<<<<< HEAD
    $listener = new LoginListener();
=======
    $listener = new LoginListener;
>>>>>>> 0a02158a (.)

    Assert::assertInstanceOf(LoginListener::class, $listener);
});

test('LogoutListener can be instantiated', function () {
<<<<<<< HEAD
    $listener = new LogoutListener();
=======
    $listener = new LogoutListener;
>>>>>>> 0a02158a (.)

    Assert::assertInstanceOf(LogoutListener::class, $listener);
});
