<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources\ActivityResource\Pages;

use Modules\Activity\Filament\Resources\ActivityResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
<<<<<<< HEAD
use Modules\Activity\Filament\Resources\ActivityResource\Schemas\ActivityInfolist;
=======
>>>>>>> laraxot/dev

class ViewActivity extends XotBaseViewRecord
{
    protected static string $resource = ActivityResource::class;
<<<<<<< HEAD

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    protected function getInfolistSchema(): array
    {
        return app(ActivityInfolist::class)->getInfolistSchema();
    }
=======
>>>>>>> laraxot/dev
}
