<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

use Modules\Activity\Models\Policies\ActivityPolicy;
use Modules\Activity\Tests\TestCase;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

describe('Activity Policy', function (): void {
    test('user with permission can view', function (): void {
        /** @var TestCase $this */
        // Create a mock user with permission
        $user = $this->createUnitMock(User::class);
        $user->method('hasPermissionTo')->willReturnCallback(
            static fn (string $permission): bool => $permission === 'activity.view'
        );

        $policy = new ActivityPolicy();
        $result = $policy->view($user);

        Assert::assertTrue($result);
    });

    test('user without permission cannot view', function (): void {
        // Create a mock user without permission
        /** @var TestCase $this */
        $user = $this->createUnitMock(User::class);
        $user->method('hasPermissionTo')->willReturnCallback(
            static fn (string $permission): bool => false
        );

        $policy = new ActivityPolicy();
        $result = $policy->view($user);

        Assert::assertFalse($result);
    });
});
