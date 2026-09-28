<?php

declare(strict_types=1);

namespace Modules\Activity\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;
use Modules\Xot\Actions\Module\GetModulePathByGeneratorAction;
use Override;

/**
 * Service Provider per il modulo Activity.
 *
 * Gestisce la registrazione e il boot del modulo per il tracciamento delle attività utente.
 *
 * @phpstan-type ModuleConfig array{name: string, alias: string, description: string, keywords: array<int, string>, priority: int, providers: array<int, class-string>}
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
    protected string $moduleDir = __DIR__;

    /**
     * Namespace del modulo.
     */
    protected string $moduleNs = __NAMESPACE__;

    /**
     * Boot del service provider.
     *
     * Configura il modulo Activity e registra le configurazioni specifiche.
     */
    #[Override]
    public function boot(): void
    {
        parent::boot();

        // Registro solo le configurazioni specifiche del modulo
        $this->registerConfig();

        // Registra i componenti Blade personalizzati
        $this->registerBladeComponents();
    }

    /**
     * Registra i servizi del provider.
     */

    /**
     * Registra le configurazioni del modulo.
     */
    #[Override]
    protected function registerConfig(): void
    {
        $configFile = app(GetModulePathByGeneratorAction::class)
            ->execute($this->name, 'config').'/config.php';

        if (! is_file($configFile)) {
            return;
        }

        $this->publishes([
            $configFile => config_path('activity.php'),
        ], 'config');

        $this->mergeConfigFrom($configFile, 'activity');
    }
}
