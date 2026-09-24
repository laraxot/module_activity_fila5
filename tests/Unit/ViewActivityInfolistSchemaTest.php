<?php

declare(strict_types=1);
<<<<<<< .merge_file_z59vEb
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
=======
use Modules\Activity\Filament\Resources\ActivityResource;
use Modules\Activity\Filament\Resources\ActivityResource\Pages\ViewActivity;
>>>>>>> .merge_file_EDXDLh

test('ViewActivity uses the standard view record page contract', function (): void {
    expect(ViewActivity::getResource())->toBe(ActivityResource::class);
});
