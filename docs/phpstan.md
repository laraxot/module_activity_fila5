---
module: Activity
topic: phpstan
status: canonical
updated: 2026-08-24
---

# PHPStan nel modulo Activity

## Stories attive

- [ACTIVITY-7.1 — contratti azioni e test](./stories/7.1.phpstan-activity-contracts.story.md)
  possiede Action, pagina applicativa e Feature test.
- [ACTIVITY-7.2 — contratti dei test harness](./stories/7.2.phpstan-test-harness-contracts.story.md)
  possiede i 39 findings residui in fixture, TestCase e Unit test.

Il gate canonico usa la configurazione root, senza baseline o configurazioni locali:

```bash
cd laravel
php -d memory_limit=-1 ./vendor/bin/phpstan analyse Modules/Activity --no-progress
```

## Contratti da preservare

- `RedactModelAttributesAction` accetta e restituisce mappe con chiavi stringa e
  rimuove le quattro chiavi sensibili dichiarate dall'Action.
- Callback di collection, query e test usano tipi concreti; `mixed` non sostituisce
  un contratto conosciuto.
- `Activity`, `Snapshot` e `StoredEvent` mantengono la connection `activity` e il
  log resta append-only.
- I test appartengono al gate. Quelli di integrazione possono essere saltati solo
  quando il database condiviso non espone `activity_log`; gli unitari restano attivi.

## Verifica circoscritta

L'analisi dei file owned localizza la causa, ma non sostituisce il gate module-wide:

```bash
./vendor/bin/phpstan analyse \
  Modules/Activity/app/Actions/RedactModelAttributesAction.php \
  Modules/Activity/app/Filament/Pages/ListLogActivities.php \
  Modules/Activity/tests/Feature/ActivityEventSourcingTest.php \
  Modules/Activity/tests/Feature/ActivityIntegrationTest.php --no-progress

./vendor/bin/pest \
  Modules/Activity/tests/Unit/Actions/RedactModelAttributesActionTest.php \
  Modules/Activity/tests/Feature/ActivityEventSourcingTest.php \
  Modules/Activity/tests/Feature/ActivityIntegrationTest.php --no-coverage
```

Il report globale storico resta in
[`Themes/docs/shared-components/phpstan-report-Modules.txt`](../../../Themes/docs/shared-components/phpstan-report-Modules.txt).

PHPMD può fallire prima dell'analisi quando PDepend e Symfony DependencyInjection
hanno firme incompatibili. È un problema del toolchain da riportare separatamente,
non un motivo per sopprimere PHPStan.

Campagna 4.26 (`analyse Modules/Activity`, 2026-08-24): **[OK] No errors**.
Coda D/Z nel TestCase (gruppi via sorgente, non `Test::groups()` interno), Safe su
filesystem, generics sulle fixture Filament. File test: **0 cancellati**; probe su API
Filament/listener inesistenti rimossi *dentro* i file esistenti.

## Esito ACTIVITY-7.2

La baseline cold di 39 findings è stata portata a zero nel modulo. I test harness ora
dichiarano generics di paginator/collection, il TestCase non usa più `groups()` interno di
PHPUnit e i test Filament coprono le classi Table correnti invece dei getter deprecati.

Disposition dei test messi in discussione:

- **7 test rimossi:** 3 duplicati su getter Filament deprecati, 2 probe del provider senza
  effetto e 2 probe del listener sostituiti dal test comportamentale;
- **3 test riscritti:** delegazione recorder senza tautologia, paginator invalido senza
  mock impossibile e logout autenticato con persistenza reale;
- **29 test mantenuti verdi**, con 65 asserzioni nel gate mirato.

Il logout Eloquent salva `causer_type = user` tramite morph map: il test verifica il nome
morfologico pubblico, non il nome PHP concreto del modello.
