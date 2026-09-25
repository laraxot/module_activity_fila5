<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

<<<<<<< HEAD
=======
use Mockery;
use Mockery\MockInterface;
>>>>>>> laraxot/dev
use Modules\Activity\Models\Policies\StoredEventPolicy;
use Modules\Activity\Tests\TestCase;
use Modules\User\Models\Policies\UserBasePolicy;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);

test('policy extends user base policy', function (): void {
    $policy = new StoredEventPolicy;
=======
uses(\Modules\Activity\Tests\TestCase::class);

test('policy extends user base policy', function (): void {
    $policy = new StoredEventPolicy();
>>>>>>> laraxot/dev

    Assert::assertInstanceOf(UserBasePolicy::class, $policy);
});

test('user with permission can view', function (): void {
<<<<<<< HEAD
    /** @var TestCase $this */
    $user = $this->createUnitMock(User::class);
    $user->method('hasPermissionTo')->willReturn(true);

    $policy = new StoredEventPolicy;
=======
    /** @var MockInterface&User $user */
    $user = Mockery::mock(User::class);
    $user->shouldReceive('hasPermissionTo')->with('stored_event.view')->andReturn(true);

    $policy = new StoredEventPolicy();
>>>>>>> laraxot/dev
    Assert::assertTrue($policy->view($user));
});

test('user without permission cannot view', function (): void {
<<<<<<< HEAD
    /** @var TestCase $this */
    $user = $this->createUnitMock(User::class);
    $user->method('hasPermissionTo')->willReturn(false);

    $policy = new StoredEventPolicy;
=======
    /** @var MockInterface&User $user */
    $user = Mockery::mock(User::class);
    $user->shouldReceive('hasPermissionTo')->with('stored_event.view')->andReturn(false);

    $policy = new StoredEventPolicy();
>>>>>>> laraxot/dev
    Assert::assertFalse($policy->view($user));
});

test('policy create update delete restore force delete methods check permissions', function (): void {
<<<<<<< HEAD
    /** @var TestCase $this */
=======
>>>>>>> laraxot/dev
    $permissions = [
        'stored_event.create',
        'stored_event.update',
        'stored_event.delete',
        'stored_event.restore',
        'stored_event.forceDelete',
    ];

<<<<<<< HEAD
    $user = $this->createUnitMock(User::class);
    $user->method('hasPermissionTo')->willReturnCallback(
        static fn (string $permission): bool => in_array($permission, $permissions, true)
    );

    $policy = new StoredEventPolicy;
=======
    /** @var MockInterface&User $user */
    $user = Mockery::mock(User::class);
    $user->shouldReceive('hasPermissionTo')->andReturnUsing(
        static fn (string $permission): bool => in_array($permission, $permissions, true)
    );

    $policy = new StoredEventPolicy();
>>>>>>> laraxot/dev

    Assert::assertTrue($policy->create($user));
    Assert::assertTrue($policy->update($user));
    Assert::assertTrue($policy->delete($user));
    Assert::assertTrue($policy->restore($user));
    Assert::assertTrue($policy->forceDelete($user));
});
