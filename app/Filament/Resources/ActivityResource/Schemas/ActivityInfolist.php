<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources\ActivityResource\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Component;
use Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist;

<<<<<<< HEAD
class ActivityInfolist extends XotBaseResourceInfolist
{
    /**
<<<<<<< HEAD
<<<<<<< HEAD
     * @return array<string, Component>
=======
/**
 * ActivityInfolist Schema.
 */
class ActivityInfolist extends XotBaseResourceInfolist
{
    /**
     * @return array<int|string, Component>
>>>>>>> 2b6968d (.)
=======
     * @return array<string, \Filament\Schemas\Components\Component>
>>>>>>> d4098eb (.)
=======
     * @return array<string, \Filament\Schemas\Components\Component>
>>>>>>> 26b6dbd (.)
     */
    public static function getInfolistSchema(): array
    {
        return [
            'id' => TextEntry::make('id'),
            'log_name' => TextEntry::make('log_name'),
            'description' => TextEntry::make('description'),
<<<<<<< HEAD
            'event' => TextEntry::make('event'),
=======
>>>>>>> 2b6968d (.)
            'subject_type' => TextEntry::make('subject_type'),
            'subject_id' => TextEntry::make('subject_id'),
            'causer_type' => TextEntry::make('causer_type'),
            'causer_id' => TextEntry::make('causer_id'),
<<<<<<< HEAD
            'batch_uuid' => TextEntry::make('batch_uuid')->limit(30),
            'created_at' => TextEntry::make('created_at')->dateTime(),
=======
            'properties' => TextEntry::make('properties')
                ->badge(),
            'created_at' => TextEntry::make('created_at')
                ->dateTime(),
>>>>>>> 2b6968d (.)
        ];
    }
}
