<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

use Modules\Activity\Models\Policies\SnapshotPolicy;
use Modules\Activity\Tests\TestCase;
use Modules\User\Models\Policies\UserBasePolicy;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

describe('Snapshot Policy', function (): void {
    test('policy extends user base policy', function (): void {
        /** @var TestCase $this */
        $policy = new SnapshotPolicy();

        Assert::assertInstanceOf(UserBasePolicy::class, $policy);
    });

    test('policy has expected public methods', function (): void {
        $reflection = new \ReflectionClass(SnapshotPolicy::class);
        $expectedMethods = ['view', 'create', 'update', 'delete', 'restore', 'forceDelete'];

        foreach ($expectedMethods as $method) {
            Assert::assertTrue($reflection->hasMethod($method), "Missing method: {$method}");
        }
    });

    test('user with permission can view', function (): void {
        /** @var TestCase $this */
        $user = $this->createUnitMock(User::class);
        $user->method('hasPermissionTo')->willReturnCallback(
            static fn (string $permission): bool => $permission === 'snapshot.view'
        );

        $policy = new SnapshotPolicy();
        $result = $policy->view($user);

        Assert::assertTrue($result);
    });

    test('user without permission cannot view', function (): void {
        /** @var TestCase $this */
        $user = $this->createUnitMock(User::class);
        $user->method('hasPermissionTo')->willReturnCallback(
            static fn (string $permission): bool => false
        );

        $policy = new SnapshotPolicy();
        $result = $policy->view($user);

        Assert::assertFalse($result);
    });

    test('create update delete restore forceDelete rispettano i permessi snapshot', function (): void {
        /** @var TestCase $this */
        /** @var list<array{0: string, 1: callable(SnapshotPolicy, User): bool}> $casi */
        $casi = [
            ['snapshot.create', static fn (SnapshotPolicy $p, User $u): bool => $p->create($u)],
            ['snapshot.update', static fn (SnapshotPolicy $p, User $u): bool => $p->update($u)],
            ['snapshot.delete', static fn (SnapshotPolicy $p, User $u): bool => $p->delete($u)],
            ['snapshot.restore', static fn (SnapshotPolicy $p, User $u): bool => $p->restore($u)],
            ['snapshot.forceDelete', static fn (SnapshotPolicy $p, User $u): bool => $p->forceDelete($u)],
        ];

        foreach ($casi as [$permesso, $callback]) {
            $policy = new SnapshotPolicy();
            $autorizzato = $this->createUnitMock(User::class);
            $autorizzato->method('hasPermissionTo')->willReturnCallback(
                static fn (string $permission): bool => $permission === $permesso
            );
            $negato = $this->createUnitMock(User::class);
            $negato->method('hasPermissionTo')->willReturn(false);

            Assert::assertTrue($callback($policy, $autorizzato));
            Assert::assertFalse($callback($policy, $negato));
        }
    });
});
