<?php

declare(strict_types=1);

use Modules\Activity\Listeners\LoginListener;
use Modules\Activity\Listeners\LogoutListener;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('LoginListener can be instantiated', function () {
<<<<<<< HEAD
<<<<<<< HEAD
    $listener = new LoginListener();
=======
    $listener = new LoginListener;
>>>>>>> 0a02158a (.)
=======
    $listener = new LoginListener;
>>>>>>> 35d8cf69 (Initial commit)

    Assert::assertInstanceOf(LoginListener::class, $listener);
});

test('LogoutListener can be instantiated', function () {
<<<<<<< HEAD
<<<<<<< HEAD
    $listener = new LogoutListener();
=======
    $listener = new LogoutListener;
>>>>>>> 0a02158a (.)
=======
    $listener = new LogoutListener;
>>>>>>> 35d8cf69 (Initial commit)

    Assert::assertInstanceOf(LogoutListener::class, $listener);
});
