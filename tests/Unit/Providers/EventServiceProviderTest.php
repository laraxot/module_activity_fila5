<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Providers;

use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;
use Modules\Activity\Listeners\LoginListener;
use Modules\Activity\Listeners\LogoutListener;
use Modules\Activity\Providers\EventServiceProvider;
use PHPUnit\Framework\Assert;

test('event service provider registers login and logout listeners', function () {
    $provider = new EventServiceProvider(app());

    $reflection = new \ReflectionClass($provider);
    $property = $reflection->getProperty('listen');
    $property->setAccessible(true);

    /** @var array<class-string, array<int, class-string>> $listen */
    $listen = $property->getValue($provider);

    Assert::assertArrayHasKey(Login::class, $listen);
    Assert::assertArrayHasKey(Logout::class, $listen);
    Assert::assertContains(LoginListener::class, $listen[Login::class]);
    Assert::assertContains(LogoutListener::class, $listen[Logout::class]);
});
