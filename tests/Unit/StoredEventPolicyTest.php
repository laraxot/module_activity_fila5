<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

use Modules\Activity\Models\Policies\StoredEventPolicy;
<<<<<<< HEAD
use Modules\Activity\Tests\TestCase;
=======
>>>>>>> 2d6a374 (.)
use Modules\User\Models\Policies\UserBasePolicy;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(\Modules\Activity\Tests\TestCase::class);
=======
class StoredEventPolicyTest extends TestCase
{
    #[Test]
    public function policy_extends_user_base_policy(): void
    {
        $this->assertTrue(
            is_subclass_of(
                StoredEventPolicy::class,
                UserBasePolicy::class
            )
        );
    }
>>>>>>> 2d6a374 (.)

test('policy extends user base policy', function (): void {
    $policy = new StoredEventPolicy();

    Assert::assertInstanceOf(UserBasePolicy::class, $policy);
});

test('user with permission can view', function (): void {
    /** @var TestCase $this */
    $user = $this->createUnitMock(User::class);
    $user->method('hasPermissionTo')->with('stored_event.view')->willReturn(true);

    $policy = new StoredEventPolicy();
    Assert::assertTrue($policy->view($user));
});

test('user without permission cannot view', function (): void {
    /** @var TestCase $this */
    $user = $this->createUnitMock(User::class);
    $user->method('hasPermissionTo')->with('stored_event.view')->willReturn(false);

    $policy = new StoredEventPolicy();
    Assert::assertFalse($policy->view($user));
});

test('policy create update delete restore force delete methods check permissions', function (): void {
    /** @var TestCase $this */
    $permissions = [
        'stored_event.create',
        'stored_event.update',
        'stored_event.delete',
        'stored_event.restore',
        'stored_event.forceDelete',
    ];

    $user = $this->createUnitMock(User::class);
    $user->method('hasPermissionTo')->willReturnCallback(
        static fn (string $permission): bool => in_array($permission, $permissions, true)
    );

    $policy = new StoredEventPolicy();

    Assert::assertTrue($policy->create($user));
    Assert::assertTrue($policy->update($user));
    Assert::assertTrue($policy->delete($user));
    Assert::assertTrue($policy->restore($user));
    Assert::assertTrue($policy->forceDelete($user));
});
