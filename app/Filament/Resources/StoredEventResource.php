<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Resources;

use Filament\Support\Components\Component;
use Modules\Activity\Models\StoredEvent;
use Modules\Xot\Filament\Resources\XotBaseResource;

class StoredEventResource extends XotBaseResource
{
    protected static ?string $model = StoredEvent::class;

    /**
     * Required by XotBaseResource abstract contract.
     * Actual schema is resolved from StoredEventResource/Schemas/StoredEventForm::configure().
     *
     * @return array<string, Component>
     */
    public static function getFormSchema(): array
    {
        return [];
    }
}
