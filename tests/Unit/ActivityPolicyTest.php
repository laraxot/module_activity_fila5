<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit;

use Modules\Activity\Models\Policies\ActivityPolicy;
use Modules\Activity\Tests\Fixtures\ActivityPolicyUser;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

/**
 * @param  list<string>  $permessi
 */
function activityFakeUser(array $permessi): User
{
    return new ActivityPolicyUser($permessi);
}

describe('Activity Policy', function (): void {
    test('user with permission can view', function (): void {
        $policy = new ActivityPolicy();
        Assert::assertTrue($policy->view(activityFakeUser(['activity.view'])));
    });

    test('user without permission cannot view', function (): void {
        $policy = new ActivityPolicy();
        Assert::assertFalse($policy->view(activityFakeUser([])));
    });

    test('create update delete restore forceDelete rispettano i permessi', function (): void {
        /** @var list<array{0: string, 1: callable(ActivityPolicy, User): bool}> $casi */
        $casi = [
            ['activity.create', static fn (ActivityPolicy $p, User $u): bool => $p->create($u)],
            ['activity.update', static fn (ActivityPolicy $p, User $u): bool => $p->update($u)],
            ['activity.delete', static fn (ActivityPolicy $p, User $u): bool => $p->delete($u)],
            ['activity.restore', static fn (ActivityPolicy $p, User $u): bool => $p->restore($u)],
            ['activity.forceDelete', static fn (ActivityPolicy $p, User $u): bool => $p->forceDelete($u)],
        ];

        foreach ($casi as [$permesso, $callback]) {
            $policy = new ActivityPolicy();
            Assert::assertTrue($callback($policy, activityFakeUser([$permesso])));
            Assert::assertFalse($callback($policy, activityFakeUser([])));
        }
    });
});
