<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources;

use Modules\Activity\Filament\Resources\StoredEventResource\Pages\CreateStoredEvent;
use Modules\Activity\Filament\Resources\StoredEventResource\Pages\EditStoredEvent;
use Modules\Activity\Filament\Resources\StoredEventResource\Pages\ListStoredEvents;
use Modules\Activity\Models\StoredEvent;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;

class StoredEventResource extends XotBaseResource
{
    protected static ?string $model = StoredEvent::class;

    #[Override]
    public static function getPages(): array
    {
        return [
            'index' => ListStoredEvents::route('/'),
            'create' => CreateStoredEvent::route('/create'),
            'edit' => EditStoredEvent::route('/{record}/edit'),
        ];
    }
}
