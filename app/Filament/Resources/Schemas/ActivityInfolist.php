<?php

namespace Modules\Activity\App\Filament\Resources\Schemas;

use Filament\Infolists\Components\DateTimeEntry;
use Filament\Infolists\Components\Select;
use Filament\Infolists\Components\TextEntry;

class ActivityInfolist
{
    public static function getSchema(): array
    {
        return [
            'label' => 'Activity Summary',
            'schema' => [
                TextEntry::make('title')
                    ->label('Title')
                    ->placeholder('Enter activity title')
                    ->required(),
                TextEntry::make('description')
                    ->label('Description')
                    ->placeholder('Provide a brief description')
                    ->maxLength(255),
                Select::make('priority')
                    ->label('Priority')
                    ->options([
                        'low' => 'Low',
                        'medium' => 'Medium',
                        'high' => 'High',
                    ])
                    ->default('medium')
                    ->required(),
                DateTimeEntry::make('scheduled_at')
                    ->label('Scheduled At')
                    ->placeholder('Select a date and time')
                    ->default('now')
                    ->nullable(),
            ],
        ];
    }
}
