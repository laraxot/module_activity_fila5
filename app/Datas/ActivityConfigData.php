<?php

declare(strict_types=1);

namespace Modules\Activity\Datas;

use Modules\Xot\Datas\Concerns\MakesFromTenantConfig;
use Spatie\LaravelData\Data;

/** Config tenant per la SettingPage di Activity, senza chiavi esposte al form. */
class ActivityConfigData extends Data
{
    use MakesFromTenantConfig;

    public bool $enabled = true;

    public int $delete_records_older_than_days = 365;
}
