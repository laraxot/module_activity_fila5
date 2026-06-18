<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

use Modules\Activity\Listeners\LogoutListener;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(\Modules\Activity\Tests\TestCase::class);

describe('Logout Listener', function (): void {
    test('listener class exists', function (): void {
Assert::assertTrue(class_exists(LogoutListener::class));
    });

    test('listener has handle method', function (): void {
$listener = new LogoutListener;
        $reflection = new \ReflectionClass($listener);

        Assert::assertTrue($reflection->hasMethod('handle'));
    });
});
=======
class LogoutListenerTest extends TestCase
{
    #[Test]
    public function listener_class_exists(): void
    {
        $this->assertTrue(class_exists(LogoutListener::class));
    }

    #[Test]
    public function listener_has_handle_method(): void
    {
        $listener = new LogoutListener;
        $this->assertTrue(method_exists($listener, 'handle'));
    }
}
>>>>>>> 2d6a374 (.)
