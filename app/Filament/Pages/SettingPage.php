<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Modules\Xot\Filament\Pages\BaseSettingPage;

/**
 * Impostazioni di Activity (`config/{tenant}/activity.php`), solo super-admin. Pagina senza campi: la
 * convenzione (Data, file del tenant, accesso) sta in BaseSettingPage e in
 * \Modules\Activity\Datas\ActivityConfigData.
 */
class SettingPage extends BaseSettingPage
{
    public static function getConfigName(): string
    {
        return 'activitylog';
    }

    /**
     * @return array<string, TextInput|Toggle>
     */
    protected function getFormSchema(): array
    {
        return [
            ...parent::getFormSchema(),
            'delete_records_older_than_days' => TextInput::make('delete_records_older_than_days')->numeric()->integer()->minValue(1)->required(),
        ];
    }
}
