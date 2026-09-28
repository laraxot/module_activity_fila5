<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources;

<<<<<<< HEAD
use Modules\Activity\Models\Snapshot;
use Modules\Xot\Filament\Resources\XotBaseResource;
=======
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Modules\Activity\Filament\Resources\SnapshotResource\Pages\CreateSnapshot;
use Modules\Activity\Filament\Resources\SnapshotResource\Pages\EditSnapshot;
use Modules\Activity\Filament\Resources\SnapshotResource\Pages\ListSnapshots;
use Modules\Activity\Models\Snapshot;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;
>>>>>>> laraxot/dev

class SnapshotResource extends XotBaseResource
{
    protected static ?string $model = Snapshot::class;
<<<<<<< HEAD
=======

   
>>>>>>> laraxot/dev
}
