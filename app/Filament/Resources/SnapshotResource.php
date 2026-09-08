<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources;

use Modules\Activity\Filament\Resources\SnapshotResource\Pages\CreateSnapshot;
use Modules\Activity\Filament\Resources\SnapshotResource\Pages\EditSnapshot;
use Modules\Activity\Filament\Resources\SnapshotResource\Pages\ListSnapshots;
use Modules\Activity\Models\Snapshot;
use Modules\Xot\Filament\Resources\XotBaseResource;
use Override;

class SnapshotResource extends XotBaseResource
{
    protected static ?string $model = Snapshot::class;

    #[Override]
    public static function getPages(): array
    {
        return [
            'index' => ListSnapshots::route('/'),
            'create' => CreateSnapshot::route('/create'),
            'edit' => EditSnapshot::route('/{record}/edit'),
        ];
    }
}
