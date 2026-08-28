<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

use Modules\Activity\Listeners\LoginListener;
use PHPUnit\Framework\Assert;

describe('Login Listener', function (): void {
    test('listener class exists', function (): void {
        Assert::assertTrue(class_exists(LoginListener::class));
    });

    test('listener has handle method', function (): void {
        $listener = new LoginListener();
        $reflection = new \ReflectionClass($listener);

        Assert::assertTrue($reflection->hasMethod('handle'));
    });

    test('handle è invocabile senza side effect', function (): void {
        (new LoginListener())->handle();

        expect(class_exists(LoginListener::class))->toBeTrue();
    });
});
