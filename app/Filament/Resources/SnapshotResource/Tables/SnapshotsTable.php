<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources\SnapshotResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\BaseFilter;
use Filament\Tables\Filters\SelectFilter;
use Modules\UI\Filament\Tables\Columns\IDColumn;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class SnapshotsTable extends XotBaseResourceTable
{
    /**
     * @return array<int|string, Column>
     */
    public function getTableColumns(): array
    {
        return [
            'id' => IDColumn::make('id')->searchable()->sortable(),
            'aggregate_uuid' => TextColumn::make('aggregate_uuid')->searchable()->limit(30),
            'aggregate_version' => TextColumn::make('aggregate_version')->searchable()->sortable(),
            'state' => TextColumn::make('state')->limit(50),
            'created_at' => TextColumn::make('created_at')->dateTime(),
            'updated_at' => TextColumn::make('updated_at')->dateTime(),
        ];
    }

    /**
     * @return array<BaseFilter>
     */
    public function getTableFilters(): array
    {
        return [
            'aggregate_type' => SelectFilter::make('aggregate_type')
                ->options([
                    'user' => 'User',
                    'profile' => 'Profile',
                    'role' => 'Role',
                ])
                ->multiple(),
        ];
    }
}
