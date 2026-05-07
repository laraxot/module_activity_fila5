<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources\StoredEventResource\Tables;

use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

/**
 * StoredEventsTable Schema.
 */
class StoredEventsTable extends XotBaseResourceTable
{
    /**
     * @return array<int|string, TextColumn>
     */
    public static function getTableColumns(): array
    {
        return [
            TextColumn::make('id')
                ->sortable(),
            TextColumn::make('event_class')
                ->searchable()
                ->sortable(),
            TextColumn::make('aggregate_uuid')
                ->searchable()
                ->sortable(),
            TextColumn::make('aggregate_version')
                ->sortable(),
            TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
        ];
    }
}
