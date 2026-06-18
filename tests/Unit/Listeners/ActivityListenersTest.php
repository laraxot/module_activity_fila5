<?php

declare(strict_types=1);

<<<<<<< HEAD
=======
uses(\Modules\Activity\Tests\TestCase::class);

>>>>>>> 2d6a374 (.)
use Modules\Activity\Listeners\LoginListener;
use Modules\Activity\Listeners\LogoutListener;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('LoginListener can be instantiated', function () {
    $listener = new LoginListener;

    Assert::assertInstanceOf(LoginListener::class, $listener);
});

test('LogoutListener can be instantiated', function () {
    $listener = new LogoutListener;

    Assert::assertInstanceOf(LogoutListener::class, $listener);
});
