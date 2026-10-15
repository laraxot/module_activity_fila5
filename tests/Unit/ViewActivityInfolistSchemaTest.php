<?php

declare(strict_types=1);
use Modules\Activity\Filament\Resources\ActivityResource;
use Modules\Activity\Filament\Resources\ActivityResource\Pages\ViewActivity;

test('ViewActivity uses the standard view record page contract', function (): void {
    expect(ViewActivity::getResource())->toBe(ActivityResource::class);
});
