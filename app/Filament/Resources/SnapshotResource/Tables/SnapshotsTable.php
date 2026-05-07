<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources\SnapshotResource\Tables;

use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

/**
 * SnapshotsTable Schema.
 */
class SnapshotsTable extends XotBaseResourceTable
{
    /**
     * @return array<int|string, TextColumn>
     */
    public static function getTableColumns(): array
    {
        return [
            TextColumn::make('id')
                ->sortable(),
            TextColumn::make('model_type')
                ->searchable()
                ->sortable(),
            TextColumn::make('model_id')
                ->sortable(),
            TextColumn::make('created_by_type')
                ->searchable()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('created_by_id')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('created_at')
                ->dateTime()
                ->sortable(),
        ];
    }
}
