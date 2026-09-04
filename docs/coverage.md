---
module: theme
topic: coverage
canonical: ../../../Themes/docs/shared-components/coverage.txt
---

See canonical documentation: ../../../Themes/docs/shared-components/coverage.txt

## PHPStan — 2026-09-02 (swarm long-tail, sessione 6748f176)

17 errori level max chiusi in 6 file: const PHP 8.3 typed
(`RedactModelAttributesAction::SENSITIVE_KEYS`), cast.string→narrowing
`is_scalar()`/`Stringable` in `ListLogActivities`, param type sui closure
di test mancanti, e migrazione di `FilamentTest.php` dai metodi Filament
deprecati `getTableColumns()/getTableFilters()/getTableActions()/
getTableBulkActions()` a `$page->table(Table::make($page))->getColumns()/
getFilters()/getRecordActions()/getToolbarActions()`. Verifica isolata
(`phpstan analyse -c <tmpDir dedicata> Modules/Activity`): 0 errori. Commit
`925e9b3e`, push rejected su laraxot e provtv (dev locale behind 1329) —
commit intatto, non forzato.

Test Pest non eseguibile in questa sessione: DB di test (10.100.200.53:3306)
irraggiungibile (`nc -z` in timeout).

## Mixed type reduction — 2026-09-04

Censiti 159 usi nativi/docblock di `mixed` in 50 file. Sostituiti 4 dove il tipo reale
era desumibile con confidenza dal contesto:

- `app/Filament/Resources/ActivityResource/Pages/ListActivities.php` e
  `.../Tables/ActivitysTable.php`: `getTableColumns(): array<string, mixed>` →
  `array<string, TextColumn>` (ogni entry e' effettivamente una `TextColumn`).
- `tests/Fixtures/ListLogActivitiesNestedFormResource.php`: `canRestore(mixed $record)`
  → `canRestore(Model $record)`, allineato al contratto reale
  (`XotBaseEditRecord::canRestore(Model $record): bool`, chiamato come
  `$resource::canRestore($this->record)` in `ListLogActivities.php`).
- `tests/Feature/FilamentTest.php`: `fn (mixed $action): bool => $action instanceof Action`
  → `fn (Action|ActionGroup $action): bool`, allineato al return type reale di Filament
  `HasRecordActions::getRecordActions(): array<Action|ActionGroup>`.

Il resto (~155 occorrenze) e' stato lasciato `mixed` con motivazione verificata, non solo
assunta:

- `app/Models/Activity.php` (19) e `app/Models/StoredEvent.php` (3): quasi tutti
  `@method`/`@property` generati da ide-helper che rispecchiano le firme vendor di
  Eloquent Builder/Model (`mixed $value` su `whereDate`/`find`/`firstWhere`/ecc.) o
  colonne JSON genuinamente polimorfe (`properties`, `attribute_changes`, `changes`).
  Narrowing romperebbe la generazione automatica e non aggiunge garanzie reali.
- `app/Adapters/ActivityLogger.php` e il duplicato legacy `app/Actions/ActivityLogger.php`:
  `log(string $type, mixed $user = null, ...)`. Verificato via test
  (`tests/Unit/Actions/ActivityLoggerTest.php:47`,
  `tests/Unit/Actions/CoverageHundredActionsTest.php:233`) che il metodo e' chiamato
  deliberatamente con valori non-`User` (stringhe, `stdClass`) per testare che venga
  lanciata `InvalidArgumentException`. Tipizzare `User|null` cambierebbe il fallimento in
  `TypeError` prima che il corpo del metodo giri: e' un boundary di validazione runtime
  intenzionale, non un gap di tipizzazione.
- `app/Contracts/ActivityRecorderContract.php`, `app/Models/Contracts/ActivityRecorderContract.php`,
  `app/Adapters/ActivityRecorder.php`, `app/Actions/Query/GetSubjectActivityLogAction.php`,
  `app/Actions/RedactModelAttributesAction.php`, `app/Models/Snapshot.php`, tutte le
  `database/factories/*.php`: `array<string, mixed>` su payload/diff/attributi/stato
  genuinamente polimorfi (JSON, attributi Eloquent, snapshot state, factory `definition()`).
- Pattern Pest `expect(fn (): mixed => ...)->toThrow(...)`: decine di occorrenze, idioma
  standard Pest per assertion di eccezione dove il valore di ritorno e' irrilevante.
- `tests/Feature/CodeQualityTest.php:51`: tentata la narrowing a `array<int, string>` per
  l'output di `exec()`, ma PHPStan (verificato con run reale, non assunto) continua a
  vedere `$outputLines` come `array` generico dopo il passaggio by-ref — la firma
  `mixed $line` + guardia `is_string()` e' l'unica forma che passa a 0 errori. Ripristinato
  l'originale.
- `tests/Fixtures/ListLogActivitiesNonSchemaFormResource.php`: `form(mixed $schema)` /
  `canRestore(mixed $record)` non toccati — fixture che testa deliberatamente la forma
  "non conforme" (`form()` ritorna `stdClass` invece di `Schema`), narrowing snaturerebbe
  il test.
- `tests/Unit/Filament/ListLogActivitiesPureMethodsTest.php` e
  `tests/Fixtures/ListLogActivitiesPageHarness.php`: `exposeToTranslationString(mixed $value)`
  richiama via reflection un metodo privato `toTranslationString` che non risulta piu'
  presente in `ListLogActivities.php` nello stato corrente (probabile rename/rimozione di
  un'altra sessione concorrente, la working tree del modulo era gia' ampiamente dirty
  prima di questo task) — non toccato per mancanza di confidenza sul tipo reale, non
  verificabile senza il metodo sorgente.

**PHPStan**: 0 → 0 errori (`./vendor/bin/phpstan analyse Modules/Activity --no-progress`),
nessuna regressione.

**PHPMD**: crash su tutto il modulo (`No node to visit provided for visitAnonymousClass`,
noto/pre-esistente). Rieseguito sui 4 file toccati: un solo finding informativo,
pre-esistente (`UnusedFormalParameter $record` in
`ListLogActivitiesNestedFormResource::canRestore`, gia' inutilizzato prima del rename di
tipo).

**Pest**: `./vendor/bin/pest Modules/Activity/tests -c Modules/Activity/phpunit.xml
--no-coverage` fallisce subito con `Cannot open bootstrap script
".../Modules/Activity/vendor/autoload.php"` — `phpunit.xml` del modulo dichiara
`bootstrap="vendor/autoload.php"` (relativo, punta a un `vendor/` locale al modulo che
non esiste; il monorepo ha un solo `vendor/` in `laravel/`). Non e' un file toccato da
questa sessione (`git status` lo mostra pulito, `git log` non lo tocca da tempo): difetto
pre-esistente del modulo, non imputabile a questo diff. Suite non eseguibile con
l'invocazione canonica.

## Quality gate phpmd + pest + coverage — 2026-09-04 (sessione successiva)

Corretto in questa sessione il bootstrap path lasciato aperto sopra (vedi
`docs/stories/activity-quality-gate-phpmd-pest-2026-09-04.story.md` per il dettaglio
completo). Riepilogo numeri reali:

**PHPStan**: 0 → 0 errori, nessuna regressione (`analyse Modules/Activity`, cache pulita).

**PHPMD** (`./tools/phpmd.sh Modules/Activity/app text ../docs/phpmd.ruleset.xml`): 5 → 3
finding. Fixati: `UnusedFormalParameter $_key` in
`app/Actions/ActivityLogger.php:264` (rimosso, closure PHP accetta meno argomenti del
chiamante) e `LongVariable $defaultRecordsPerPageSelectOption` in
`app/Filament/Pages/Concerns/CanPaginate.php:18` (rinominata `$defaultPerPageOption`,
aggiornati in lockstep `tests/Fixtures/CanPaginateHarness.php` e
`tests/Feature/FilamentTest.php` che la referenziano per nome via reflection). Restano 3
`CouplingBetweenObjects` (`app/Actions/ActivityLogger.php:22` — 14, soglia 13;
`app/Adapters/ActivityLogger.php:29` — 19, soglia 13; `app/Filament/Pages/
ListLogActivities.php:43` — 19, soglia 13): tutte classi coordinator (delegano a
QueueableAction singole, pattern architetturale del repo) o Filament Resource Page (glue
code framework) — non fixate, documentate come coupling accettato.

**Pest**: `phpunit.xml` aveva `bootstrap="vendor/autoload.php"` (path relativo errato,
0 test eseguibili) — corretto in `../../vendor/autoload.php` (stesso pattern di
Lang/Notify/Tenant/UI/Xot). Un secondo bug bloccante, questa volta fatale a runtime, era
in `tests/Feature/TestActivityModel.php`: collisione tra trait `HasFactory` (Laravel,
`newFactory()` non tipizzato) e `HasXotFactory` (Xot, ereditato tipizzato da
`XotBaseModel` via `BaseModel`) — risolta con `insteadof` esplicito. Invocazione
canonica: `php -d xdebug.mode=coverage ./vendor/bin/pest --test-directory
Modules/Activity/tests -c Modules/Activity/phpunit.xml`.

Risultato, deterministico su 3 run separate: **340 passed / 92 failed / 6 risky su 432
test (5679 assertion)** — prima di questi due fix: **0 test eseguibili** (fatal crash
prima ancora di iniziare). I 92 fallimenti residui sono pre-esistenti e non causati da
questo diff (verificato isolando `ActivityLoggerTest.php`: 15/16 failed nella run
completa → 16/16 passed in isolamento, prova di inquinamento di stato statico
`Model::$booting` tra file nello stesso processo, non un bug reale):
- 43 `LogicException` (`Model::bootIfNotBooted ... while it is being booted`) — cascata da
  stato statico non resettato dopo un'eccezione precoce in un test precedente nello stesso
  processo.
- 26 `BindingResolutionException` (`Target class [session]/[config] does not exist`) —
  binding container mancanti per test non agganciati alla `TestCase` del modulo.
- ~14 `Error` di vario tipo, tra cui `Call to undefined function
  Modules\Activity\Tests\Unit\mockeryExpect()` (helper definito solo in
  `Modules/User/tests/Helpers.php`, dipendenza cross-modulo non soddisfatta quando si
  esegue solo Activity) e `Call to a member function getPath() on null` in
  `Modules/Xot/app/Actions/Factory/GetFactoryAction.php` (registrazione nwidart/modules
  non disponibile in questo bootstrap minimale).

**Coverage**: `XDEBUG_MODE=coverage` (env var) risultava ignorato da Xdebug 3.5.3 in
questo ambiente — bypassato con `php -d xdebug.mode=coverage`. `--coverage`/
`--coverage-text` non stampano nulla su stdout con questa combinazione pest/phpunit
(verificato anche su singolo file 100% passed), ma `--coverage-clover=<file>` funziona e
produce un report reale:

| Metrica | Valore |
|---|---|
| Statement coverage | 450/781 = **57.62%** |
| Method coverage | 71/134 = **52.99%** |
| Element coverage (statements+methods+conditionals) | 521/915 = **56.94%** |
| File analizzati | 67 (app/, 3519 loc / 2699 ncloc, 55 classi) |

Prima di questa sessione la coverage non era misurabile (suite non eseguibile). Il
miglioramento da "non misurabile" a 57.62% deriva interamente dai due fix bloccanti sopra
(bootstrap path + trait collision), non da test aggiunti ad hoc.

**phpinsights**: non installato in questo repo (rimosso, incompatibile con Pest 5 —
`composer show nunomaduro/phpinsights` → "not found"). Step saltato coerentemente con la
memoria second-brain `pest5-incompatibile-con-phpinsights.md`.

**Git**: commit `af7bda04` (6 file: `phpunit.xml`, `app/Actions/ActivityLogger.php`,
`app/Filament/Pages/Concerns/CanPaginate.php`, `tests/Fixtures/CanPaginateHarness.php`,
`tests/Feature/FilamentTest.php`, `tests/Feature/TestActivityModel.php`) — **non
pushato**: `git merge laraxot/dev --no-edit` abortito da git stesso ("local changes to
.gitattributes would be overwritten by merge") per 142 file modificati in working tree
non miei (lavoro concorrente di altre sessioni non ancora committato); locale 5 avanti /
1289 dietro `laraxot/dev`. Non toccati i file non miei. Vedi story per il dettaglio.
