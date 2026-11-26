<?php

declare(strict_types=1);

namespace Modules\Activity\Providers;

use Modules\Activity\Actions\Config\ApplyActivityConfigAction;
use Modules\Xot\Providers\XotBaseServiceProvider;
use Override;

/**
 * Service Provider per il modulo Activity.
 *
 * Gestisce la registrazione e il boot del modulo per il tracciamento delle attività utente.
 *
 * NON monta Folio: `Modules\Cms\Providers\FolioVoltServiceProvider` registra già
 * `resources/views/pages` (e `pages/api` → `/api`) per ogni modulo abilitato.
 * Montare qui le pagine con Folio è ridondante, anti-DRY e rischia l'ordine delle catch-all.
 * Il test `ActivityServiceProviderNoFolioMountTest` fallisce se nel sorgente compare un mount Folio.
 *
 * @see docs/bmad/stories/folio-routing-centralization.story.md
 */
class ActivityServiceProvider extends XotBaseServiceProvider
{
    /**
     * Nome del modulo.
     */
    public string $name = 'Activity';

    /**
     * Directory del modulo.
     */
    protected string $module_dir = __DIR__;

    /**
     * Namespace del modulo.
     */
    protected string $module_ns = __NAMESPACE__;

    /**
     * Boot del service provider.
     *
     * `parent::boot()` registra già traduzioni, config (via l'override `registerConfig()` qui sotto), viste,
     * migrazioni, componenti Blade, comandi e asset pubblici: qui si aggiunge solo ciò che è specifico di Activity.
     *
     * @see docs/bmad/stories/folio-routing-centralization.story.md
     */
    #[Override]
    public function boot(): void
    {
        parent::boot();

        // ANTI-PATTERN: non registrare qui il mount Folio delle pagine del modulo.
        // Activity possiede i FILE pages/*; il mount Folio è cross-cutting (Cms/FolioVoltServiceProvider).
        // Nei progetti senza Cms non va inventato un mini-FolioVolt nel dominio.
        // Vedi docs/bmad/stories/folio-routing-centralization.story.md

        // Le impostazioni salvate dal tenant (SettingPage) arrivano al pacchetto activitylog.
        app(ApplyActivityConfigAction::class)->execute();
    }

    /**
     * Registra le configurazioni del modulo.
     *
     * @see docs/bmad/stories/folio-routing-centralization.story.md
     */
    #[Override]
    protected function registerConfig(): void
    {
        $this->publishes([
            module_path($this->name, 'config/config.php') => config_path('activity.php'),
        ], 'config');

        $this->mergeConfigFrom(module_path($this->name, 'config/config.php'), 'activity');
    }
}
