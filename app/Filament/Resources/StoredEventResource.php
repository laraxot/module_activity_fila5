<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources;

<<<<<<< HEAD
use Modules\Activity\Models\StoredEvent;
use Modules\Xot\Filament\Resources\XotBaseResource;
=======
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Modules\Activity\Filament\Resources\StoredEventResource\Pages\CreateStoredEvent;
use Modules\Activity\Filament\Resources\StoredEventResource\Pages\EditStoredEvent;
use Modules\Activity\Filament\Resources\StoredEventResource\Pages\ListStoredEvents;
use Modules\Activity\Models\StoredEvent;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;
>>>>>>> laraxot/dev

class StoredEventResource extends XotBaseResource
{
    protected static ?string $model = StoredEvent::class;
<<<<<<< HEAD
=======

    
>>>>>>> laraxot/dev
}
