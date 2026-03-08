<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

use Modules\Activity\Models\Policies\SnapshotPolicy;
use Modules\Activity\Tests\TestCase;
use Modules\User\Models\User;
use PHPUnit\Framework\Attributes\Test;

class SnapshotPolicyTest extends TestCase
{
    use \Illuminate\Foundation\Testing\DatabaseTransactions;

    #[Test]
    public function policy_extends_user_base_policy(): void
    {
        // @var mixed assertTrue(
            is_subclass_of(
                SnapshotPolicy::class,
                \Modules\User\Models\Policies\UserBasePolicy::class
            )
        );
    }

    #[Test]
    public function policy_has_view_method(): void
    {
        // @var mixed assertTrue(method_exists(SnapshotPolicy::class, 'view';
    }

    #[Test]
    public function policy_has_create_method(): void
    {
        // @var mixed assertTrue(method_exists(SnapshotPolicy::class, 'create';
    }

    #[Test]
    public function policy_has_update_method(): void
    {
        // @var mixed assertTrue(method_exists(SnapshotPolicy::class, 'update';
    }

    #[Test]
    public function policy_has_delete_method(): void
    {
        // @var mixed assertTrue(method_exists(SnapshotPolicy::class, 'delete';
    }

    #[Test]
    public function policy_has_restore_method(): void
    {
        // @var mixed assertTrue(method_exists(SnapshotPolicy::class, 'restore';
    }

    #[Test]
    public function policy_has_force_delete_method(): void
    {
        // @var mixed assertTrue(method_exists(SnapshotPolicy::class, 'forceDelete';
    }

    #[Test]
    public function user_with_permission_can_view(): void
    {
        // Create a mock user with permission
        $user = // @var mixed createMock(User::class;
        $user->method('hasPermissionTo')->with('snapshot.view')->willReturn(true);

        $policy = new SnapshotPolicy();
        $result = $policy->view($user);

        // @var mixed assertTrue($result;
    }

    #[Test]
    public function user_without_permission_cannot_view(): void
    {
        // Create a mock user without permission
        $user = // @var mixed createMock(User::class;
        $user->method('hasPermissionTo')->with('snapshot.view')->willReturn(false);

        $policy = new SnapshotPolicy();
        $result = $policy->view($user);

        // @var mixed assertFalse($result;
    }
}
