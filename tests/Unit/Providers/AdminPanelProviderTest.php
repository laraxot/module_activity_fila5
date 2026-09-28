<?php

declare(strict_types=1);

namespace Modules\Activity\Tests\Unit\Providers;

use Filament\Panel;
use Modules\Activity\Providers\Filament\AdminPanelProvider;
use Modules\Activity\Tests\TestCase;
use PHPUnit\Framework\Assert;

<<<<<<< HEAD
uses(TestCase::class);
=======
uses(\Modules\Activity\Tests\TestCase::class);
>>>>>>> laraxot/dev

test('admin panel provider returns a panel instance', function () {
    $provider = new AdminPanelProvider(app());

    $panel = $provider->panel(Panel::make());

    Assert::assertInstanceOf(Panel::class, $panel);
});
