<?php

declare(strict_types=1);

use Modules\Activity\Actions\LogUserLoginAction;
use Modules\User\Database\Factories\UserFactory;
use Modules\User\Models\User;
use PHPUnit\Framework\Assert;

test('LogUserLoginAction can be instantiated', function () {
    $user = UserFactory::new()->createOne();
    Assert::assertInstanceOf(User::class, $user);

    $action = new LogUserLoginAction($user);

    Assert::assertSame($user, $action->user);
});
