<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Pages;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Modules\Activity\Datas\ActivityConfigData;
use Modules\Xot\Filament\Pages\BaseSettingPage;

/**
 * Impostazioni di Activity (`config/{tenant}/activitylog.php`), solo super-admin.
 *
 * Le chiavi hanno il nome di quelle che legge `spatie/laravel-activitylog`: `ApplyActivityConfigAction`
 * le copia nel config all'avvio. `activitylog:clean` non e' schedulato da nessuna parte, quindi
 * `clean_after_days` ha effetto solo quando qualcuno lancia il comando.
 *
 * @see ActivityConfigData
 */
class SettingPage extends BaseSettingPage
{
    public static function getConfigName(): string
    {
        return ActivityConfigData::tenantConfigName();
    }

    /**
     * @return array<string, TextInput|Toggle>
     */
    protected function getFormSchema(): array
    {
        return [
            'enabled' => Toggle::make('enabled'),
            'clean_after_days' => TextInput::make('clean_after_days')
                ->numeric()
                ->integer()
                ->minValue(1)
                ->required(),
            'default_log_name' => TextInput::make('default_log_name')
                ->required()
                ->maxLength(255),
            'include_soft_deleted_subjects' => Toggle::make('include_soft_deleted_subjects'),
        ];
    }
}
