<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources\ActivityResource\Tables;

use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

/**
 * ActivitiesTable Schema.
 */
class ActivitiesTable extends XotBaseResourceTable
{
    /**
     * @return array<int|string, TextColumn>
     */
    public static function getTableColumns(): array
    {
        return [
            TextColumn::make('id')
                ->sortable(),
            TextColumn::make('log_name')
                ->searchable()
                ->sortable(),
            TextColumn::make('description')
                ->searchable()
                ->sortable(),
            TextColumn::make('subject_type')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('subject_id')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('causer_type')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('causer_id')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
        ];
    }
}
