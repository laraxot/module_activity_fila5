<?php

declare(strict_types=1);

namespace Modules\Activity\Filament\Pages;

use Modules\Xot\Filament\Pages\BaseSettingPage;

class SettingPage extends BaseSettingPage
{
    protected function getFormSchema(): array
    {
        return [
            'anni' => $this->anniField(),
        ];
    }
}
