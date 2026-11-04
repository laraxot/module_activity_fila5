<?php

declare(strict_types=1);

use Modules\Activity\Datas\ActivityConfigData;
use Modules\Activity\Filament\Pages\SettingPage;
use Modules\Activity\Tests\TestCase;

uses(TestCase::class)->group('no-activity-db');

test('setting page resolves config name and data class by convention', function (): void {
    expect(SettingPage::getConfigName())->toBe('activity')
        ->and(SettingPage::getConfigDataClass())->toBe(ActivityConfigData::class);
});

test('config data reads the tenant file named after the module', function (): void {
    expect(ActivityConfigData::tenantConfigName())->toBe('activity');
});
