<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources;

use Filament\Support\Components\Component;
use Modules\Activity\Models\Snapshot;
use Modules\Xot\Filament\Resources\XotBaseResource;

class SnapshotResource extends XotBaseResource
{
    protected static ?string $model = Snapshot::class;

    /**
     * Required by XotBaseResource abstract contract.
     * Actual schema is resolved from SnapshotResource/Schemas/SnapshotForm::configure().
     *
     * @return array<string, Component>
     */
    public static function getFormSchema(): array
    {
        return [];
    }
}
