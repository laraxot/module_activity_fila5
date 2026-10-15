<?php

declare(strict_types=1);

namespace Tests\Modules\Activity\Unit;

use Modules\Activity\Listeners\LoginListener;
use Tests\Modules\Activity\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Login Listener', function (): void {
    test('listener class exists', function (): void {
        Assert::assertTrue(class_exists(LoginListener::class));
    });

    test('listener has handle method', function (): void {
        $listener = new LoginListener;
        $reflection = new \ReflectionClass($listener);

        Assert::assertTrue($reflection->hasMethod('handle'));
    });
});
