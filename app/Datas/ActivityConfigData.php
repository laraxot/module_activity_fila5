<?php

declare(strict_types=1);

namespace Modules\Activity\Datas;

use Modules\Activity\Actions\Config\ApplyActivityConfigAction;
use Modules\Activity\Filament\Pages\SettingPage;
use Modules\Xot\Datas\Concerns\MakesFromTenantConfig;
use Spatie\LaravelData\Data;

/**
 * Impostazioni di Activity del tenant corrente.
 *
 * Vivono nel file `activitylog` del tenant (`config/{tenant}/activitylog.php`) e le chiavi hanno
 * lo stesso nome di quelle che `spatie/laravel-activitylog` legge da `config('activitylog')`:
 * il pacchetto non sa nulla di questa Data, quindi `ApplyActivityConfigAction` (chiamata dal
 * service provider) copia nel config le chiavi che il tenant ha salvato. I default sono quelli
 * del pacchetto (v5); la chiave v4 `delete_records_older_than_days` non e' piu' letta da nessuno,
 * oggi si chiama `clean_after_days`.
 *
 * @see SettingPage
 * @see ApplyActivityConfigAction
 */
class ActivityConfigData extends Data
{
    use MakesFromTenantConfig;

    /** Spento: nessuna attivita' viene scritta (`ActivityLogStatus`, `IsActivityLogSchemaWritableAction`). */
    public bool $enabled = true;

    /** Giorni di conservazione per `activitylog:clean` (`CleanActivitylogCommand`). */
    public int $clean_after_days = 365;

    /** Nome del registro quando `activity()` non ne riceve uno (`PendingActivityLog`). */
    public string $default_log_name = 'default';

    /** La relazione `subject` dell'attivita' include i modelli cancellati con soft delete (`Activity::subject()`). */
    public bool $include_soft_deleted_subjects = false;

    public static function tenantConfigName(): string
    {
        return 'activitylog';
    }
}
