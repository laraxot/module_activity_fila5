<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources\ActivityResource\Tables;

use Filament\Tables\Columns\Column;
use Filament\Tables\Columns\TextColumn;
use Modules\Activity\Models\Activity;
use Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable;

class ActivitysTable extends XotBaseResourceTable
{
    /**
     * @var class-string<Activity>
     */
    protected static string $model = Activity::class;

    /**
     * @return array<string, Column>
     */
    public function getTableColumns(): array
    {
        return [
            'id' => TextColumn::make('id')->searchable()->sortable(),
            'log_name' => TextColumn::make('log_name')->searchable()->sortable(),
            'description' => TextColumn::make('description')->searchable()->wrap()->limit(100),
            'created_at' => TextColumn::make('created_at')->dateTime()->sortable(),
        ];
    }
}
