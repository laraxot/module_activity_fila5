<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

use Modules\Activity\Listeners\LogoutListener;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

uses(\Modules\Activity\Tests\TestCase::class);

describe('Logout Listener', function (): void {
    test('listener class exists', function (): void {
Assert::assertTrue(class_exists(LogoutListener::class));
    });

    test('listener has handle method', function (): void {
<<<<<<< .merge_file_0gjKdJ
        $listener = new LogoutListener();
=======
$listener = new LogoutListener;
>>>>>>> .merge_file_uqjoDR
        $reflection = new \ReflectionClass($listener);

        Assert::assertTrue($reflection->hasMethod('handle'));
    });
});
