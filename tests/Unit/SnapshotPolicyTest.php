<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

use Modules\Activity\Models\Policies\SnapshotPolicy;
use Modules\Activity\Tests\TestCase;
use Modules\User\Models\Policies\UserBasePolicy;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\Test;
use ReflectionClass;

class SnapshotPolicyTest extends TestCase
{
    #[Test]
    public function policy_extends_user_base_policy(): void
    {
        $policy = new SnapshotPolicy;

        Assert::assertInstanceOf(UserBasePolicy::class, $policy);
    }

    #[Test]
    public function policy_has_expected_public_methods(): void
    {
        $reflection = new ReflectionClass(SnapshotPolicy::class);
        $expectedMethods = ['view', 'create', 'update', 'delete', 'restore', 'forceDelete'];

        foreach ($expectedMethods as $method) {
            Assert::assertTrue($reflection->hasMethod($method), "Missing method: {$method}");
        }
    }

    #[Test]
    public function user_with_permission_can_view(): void
    {
        $user = $this->createMock(User::class);
        $user->method('hasPermissionTo')->with('snapshot.view')->willReturn(true);

        $policy = new SnapshotPolicy;
        $result = $policy->view($user);

        Assert::assertTrue($result);
    }

    #[Test]
    public function user_without_permission_cannot_view(): void
    {
        $user = $this->createMock(User::class);
        $user->method('hasPermissionTo')->with('snapshot.view')->willReturn(false);

        $policy = new SnapshotPolicy;
        $result = $policy->view($user);

        Assert::assertFalse($result);
    }
}
