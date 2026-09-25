<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources\StoredEventResource\Pages;

<<<<<<< HEAD
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
=======
>>>>>>> laraxot/dev
use Modules\Activity\Filament\Resources\StoredEventResource;
use Modules\Xot\Filament\Resources\Pages\XotBaseListRecords;

class ListStoredEvents extends XotBaseListRecords
{
    protected static string $resource = StoredEventResource::class;
<<<<<<< HEAD

    /**
     * @return array<Tables\Columns\Column>
     */
    public function getTableColumns(): array
    {
        /** @phpstan-var view-string */
        $eventPropertiesView = 'activity::filament.tables.columns.event-properties';

        return [
            'id' => TextColumn::make('id'),
            'event_class' => TextColumn::make('event_class'),
            'event_properties' => ViewColumn::make('event_properties')->view($eventPropertiesView),
        ];
    }
=======
>>>>>>> laraxot/dev
}
