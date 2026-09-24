<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources\ActivityResource\Pages;

use Modules\Activity\Filament\Resources\ActivityResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseViewRecord;
use Modules\Activity\Filament\Resources\ActivityResource\Schemas\ActivityInfolist;

class ViewActivity extends XotBaseViewRecord
{
    protected static string $resource = ActivityResource::class;

    /**
     * @return array<string, \Filament\Schemas\Components\Component>
     */
    #[\Override]
    protected function getInfolistSchema(): array
    {
        return app(ActivityInfolist::class)->getInfolistSchema();
    }
}
