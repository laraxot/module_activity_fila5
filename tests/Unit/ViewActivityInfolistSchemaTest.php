<?php

declare(strict_types=1);
<<<<<<< HEAD
<<<<<<< .merge_file_8c0xwg

use Modules\Activity\Filament\Resources\ActivityResource\Pages\ViewActivity;
use Modules\Activity\Filament\Resources\ActivityResource;
=======
use Modules\Activity\Filament\Resources\ActivityResource;
use Modules\Activity\Filament\Resources\ActivityResource\Pages\ViewActivity;
>>>>>>> .merge_file_B5lwEt
=======

use Modules\Activity\Filament\Resources\ActivityResource\Pages\ViewActivity;
use Modules\Activity\Filament\Resources\ActivityResource;
>>>>>>> a95e8f36 (.)

test('ViewActivity uses the standard view record page contract', function (): void {
    expect(ViewActivity::getResource())->toBe(ActivityResource::class);
});
