<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources\SnapshotResource\Tables;

<<<<<<< HEAD
use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class SnapshotsTable extends XotBaseResourceTable
{
    /**
     * @return array<int|string, Column>
     */
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->searchable()->sortable(),
            'aggregate_uuid' => TextColumn::make('aggregate_uuid')->searchable()->limit(30),
            'aggregate_version' => TextColumn::make('aggregate_version')->searchable()->sortable(),
            'state' => TextColumn::make('state')->limit(50),
            'created_at' => TextColumn::make('created_at')->dateTime(),
            'updated_at' => TextColumn::make('updated_at')->dateTime(),
=======
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
>>>>>>> 2b6968d (.)
        ];
    }
}
