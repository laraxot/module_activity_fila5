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
<<<<<<< HEAD
=======

    public int $delete_records_older_than_days = 365;
>>>>>>> a7591e914f055e10146f5302f7bddf6973530851
}
