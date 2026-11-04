<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Pages;

use Modules\Xot\Filament\Pages\BaseSettingPage;

/**
 * Impostazioni di Activity (`config/{tenant}/activity.php`), solo super-admin. Pagina senza campi: la
 * convenzione (Data, file del tenant, accesso) sta in BaseSettingPage e in
 * \Modules\Activity\Datas\ActivityConfigData.
 */
class SettingPage extends BaseSettingPage
{
    /**
     * @return array<string, object>
     */
    protected function getFormSchema(): array
    {
        return parent::getFormSchema();
    }
}
