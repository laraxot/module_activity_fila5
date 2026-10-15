<?php

declare(strict_types=1);

namespace Tests\Modules\Activity\Unit\Providers;

use Filament\Panel;
use Modules\Activity\Providers\Filament\AdminPanelProvider;
use Tests\Modules\Activity\TestCase;
use PHPUnit\Framework\Assert;

uses(TestCase::class);

test('admin panel provider returns a panel instance', function () {
    $provider = new AdminPanelProvider(app());

    $panel = $provider->panel(Panel::make());

    Assert::assertInstanceOf(Panel::class, $panel);
});
