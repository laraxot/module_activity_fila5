<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

use Modules\Activity\Models\Policies\StoredEventPolicy;
use Modules\User\Models\Policies\UserBasePolicy;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class StoredEventPolicyTest extends TestCase
{
    #[Test]
    public function policy_extends_user_base_policy(): void
    {
        $policy = new StoredEventPolicy;

        Assert::assertInstanceOf(UserBasePolicy::class, $policy);
    }

    #[Test]
    public function user_with_permission_can_view(): void
    {
        $user = $this->createMock(User::class);
        $user->method('hasPermissionTo')->with('stored_event.view')->willReturn(true);

        $policy = new StoredEventPolicy;
        Assert::assertTrue($policy->view($user));
    }

    #[Test]
    public function user_without_permission_cannot_view(): void
    {
        $user = $this->createMock(User::class);
        $user->method('hasPermissionTo')->with('stored_event.view')->willReturn(false);

        $policy = new StoredEventPolicy;
        Assert::assertFalse($policy->view($user));
    }

    #[Test]
    public function policy_create_update_delete_restore_force_delete_methods_check_permissions(): void
    {
        $permissions = [
            'stored_event.create',
            'stored_event.update',
            'stored_event.delete',
            'stored_event.restore',
            'stored_event.forceDelete',
        ];

        $user = $this->createMock(User::class);
        $user->method('hasPermissionTo')->willReturnCallback(
            static fn (string $permission): bool => in_array($permission, $permissions, true)
        );

        $policy = new StoredEventPolicy;

        Assert::assertTrue($policy->create($user));
        Assert::assertTrue($policy->update($user));
        Assert::assertTrue($policy->delete($user));
        Assert::assertTrue($policy->restore($user));
        Assert::assertTrue($policy->forceDelete($user));
    }
}
