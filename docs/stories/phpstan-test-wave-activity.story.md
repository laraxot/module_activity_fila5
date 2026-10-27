---
title: "[STORY] PHPStan test wave, lane activity"
type: story
module: Activity
phase: implementazione, quality gate
status: done
priority: high
created: 2026-10-20
updated: 2026-10-20
tags: [phpstan, pest, tests, testcase, activity, bmad]
qmd: "phpstan test wave activity pull sottomoduli 605 errori testcase pest ghost spec c49eef12 b88f43dd"
related:
  - ../../../Xot/docs/stories/phpstan-test-wave-regression.story.md
---

# PHPStan test wave: lane activity

Fase BMAD: implementazione e quality gate. Lane `activity` del run del 2026-10-20; il coordinamento (misura, regole, scala delle decisioni) e' in [phpstan-test-wave-regression.story.md](../../../Xot/docs/stories/phpstan-test-wave-regression.story.md).

## Esito

- 19 file del bucket: **605 errori prima, 0 dopo** (misura delle 09:10, uguale alla baseline delle 09:00).
- `phpstan analyse Modules/Activity` (`app/` e `tests/`): 0 errori. Nessuna regressione nel modulo.
- `laravel/phpstan.neon` intatto; nessun `@phpstan-ignore`, nessuna baseline, nessun `mixed` aggiunto.

## Causa

Diciotto dei 19 file hanno mtime 2026-10-20 08:57; l'unico che non e' stato riscritto dal pull e' `Unit/ListLogActivitiesPageCoverageTest.php` (2026-10-08), che falliva solo perche' il nuovo `TestCase` aveva perso `makeListLogActivitiesPage()`. Il commit del modulo `b88f43dd` (2026-10-20 08:57, dopo il pull dei sottomoduli) ha riportato in `tests/` i corpi di una generazione precedente dei test. Il commit `c49eef12` (2026-10-08, "riallinea il modulo all'ultimo commit buono bc3d22ca") e' suo antenato e aveva questi stessi file a 0 errori.

Il codice di produzione tra `c49eef12` e HEAD e' lo stesso, tranne `Enums/LogLevelEnum` e due righe in `BuildLogViewerStateAction`/`LogViewerStateData`, che i test del bucket non toccano (i loro test sono gia' allineati e puliti). Quindi la forma di `c49eef12` vale ancora per il codice di oggi, e il lavoro e' stato scegliere quella forma al posto della sua inversione, non correggere 605 righe una per una.

## Scopo capito, per causa

| Causa | Errori | Scopo del codice | Correzione |
|---|---|---|---|
| Test come classi PHPUnit su `Tests\TestCase` di root (`CodeQualityTest`, `PHPStanComplianceTest`, `SnapshotBusinessLogicTest`, `StoredEventBusinessLogicTest`, `BaseModelBusinessLogicTest`): `assertStringContains` inesistente, `json_encode` non Safe, proprieta' su `mixed` | 156 | Provare che i modelli `Snapshot`/`StoredEvent`/`BaseModel` e la qualita' del modulo (sintassi, classi, traduzioni, viste) reggano | Corpi Pest di `c49eef12`, che usano `Modules\Activity\Tests\TestCase`, `Assert::` e `Safe\` |
| Pest non tipizzato (`ActivityIntegrationTest`, `ActivityEventSourcingTest`, `ActivityBusinessLogicTest`, `BaseModelBusinessLogicPestTest`, `ResourceExtensionTest`, `ActivityManagementTest`): `Model::factory()->create()` su `mixed`, `Assert` non importato, ignore superflui, offset su `mixed` | 292 | Provare il ciclo di vita di `Activity`, event sourcing, scope e Resource | Corpi di `c49eef12`: `ActivityFactory::new()->createOne()`, `Assert::`, nessun ignore |
| Specifiche fantasma (`LoginListenerTest`, `Feature/Actions/ListLogActivitiesActionTest`, `Feature/Filament/Actions/ListLogActivitiesActionTest`, `Unit/Models/ActivityTest`, `BaseModelTest`): colonne `name`/`user_id` che `activity_log` non ha, `handle(Login)` che `LoginListener` non ha, metodi dell'action che non esistono, modulo `IndennitaResponsabilita` assente | 140 | Specifiche scritte per un altro progetto o per codice mai arrivato | Corpi di `c49eef12` per cio' che esiste; stub `skip` per cio' che manca (vedi sotto) |
| Bootstrap dei test: `tests/Pest.php` definiva `createActivity()`, `makeActivity()` e `toBeActivity` globali (collidono con altri moduli, perche' il root li carica tutti) e `tests/TestCase.php` estendeva `Illuminate` direttamente, senza `DatabaseTransactions` e senza `makeListLogActivitiesPage()` | 9 + 8 | Un solo bootstrap per modulo, sopra `XotBaseTestCase` | `Pest.php` torna al solo `require_once` di `PestHelpers.php` (helper con prefisso `activity`); `TestCase.php` di `c49eef12`. I 8 errori di `ListLogActivitiesPageCoverageTest` (file mai toccato) erano il metodo statico perso dal `TestCase` |

## Cosa e' cambiato

Contenuto scritto con `git show c49eef12:<path>` (nessun checkout, restore o commit), sotto gate lock+mtime, con copia della versione precedente nello scratchpad:

- Ripristinati i 19 file del bucket piu' la fixture `tests/Feature/TestActivityModel.php`, fuori bucket ma radice di 12 errori (`@property` e `HasFactory` erano stati tolti).
- `TestActivityModel`: tolta la regola `HasXotFactory::newFactory insteadof HasFactory`. `HasXotFactory` non ha piu' `newFactory()` e una `insteadof` su un metodo assente e' un fatal error di PHP che PHPStan non vede (provato). Resta `factory insteadof HasFactory`.
- `ActivityBusinessLogicTest`: `test()` dentro `test()` diventa `describe()` con `it()`. Prima i sei casi non giravano mai (un solo test "risky" senza asserzioni); ora girano.
- `BaseModelBusinessLogicPestTest`, "can use factory": non chiama piu' `TestActivityModel::factory()`, che passa da `GetFactoryAction`, ricava il modulo da `Modules\<M>\Models\` e va in errore per una fixture sotto `Tests\Feature`. Verifica con `ReflectionMethod` che `factory()` sia pubblico e statico.
- `ResourceExtensionTest`: `XotBaseResource::getFormSchema()` e' un metodo d'istanza `final` (lo schema vero sta nelle classi `Schemas\*Form`), quindi `isStatic()` ora e' `assertFalse`; le chiavi attese per `SnapshotForm` sono quelle reali del modello (`aggregate_uuid`, `aggregate_version`, `state`), non `model_type`/`model_id` che il test chiedeva e il form non ha mai avuto.

### File con stub `skip` (SUT assente)

Il corpo scartato resta nel repo Activity al commit `b88f43dd`, stesso path.

- `tests/Unit/Listeners/LoginListenerTest.php`: 7 stub. `LoginListener::handle()` e' un segnaposto senza parametri che non registra nulla (lo conferma `LoginLogoutListenerBehaviorTest`); i test volevano `handle(Login $event)` che crea l'`Activity`.
- `tests/Feature/Actions/ListLogActivitiesActionTest.php`: 7 stub. L'action ha solo `setUp()` e `getDefaultName()`; i test chiamavano `getUrl($livewire, $record)`, `findResourceClass()`, `getFieldLabel()`, `getActivitiesModalContent()`, `getActivitiesPageClass()`, `getClassFromFile()`, su `IndennitaResponsabilita`.
- `tests/Feature/Filament/Actions/ListLogActivitiesActionTest.php`: 2 stub. L'action e' sempre visibile, non ha `visible()` legato alle attivita' del record.

### Test scartati senza stub

- `Unit/Models/ActivityTest`: "activity can be soft deleted" contraddice la story [4.1](./4.1.immutable-activity-log.story.md) (log immutabile) e `Activity` non usa `SoftDeletes`; "creates valid instances" e gli attributi `name` non esistono in `activity_log`. Resta la copertura di `ActivityFactory::new()->make()` e `createOne()`.
- `Unit/Models/BaseModelTest`: tabella, timestamp e catena di ereditarieta' sono gia' provati da `BaseModelBusinessLogicTest` e `BaseModelBusinessLogicPestTest`; restano connessione `activity` ed `extends XotBaseModel`.

## Verifica

- `phpstan analyse` sui 19 file e su `Modules/Activity`: 0 errori. `php -l` pulito.
- Pest per singolo file, senza DB: passano `CodeQualityTest` (7), `PHPStanComplianceTest` (4), `BaseModelTest` (2), `ListLogActivitiesPageCoverageTest` (10), `Feature/Actions/ListLogActivitiesActionTest` (3 + 7 skip), `Feature/Filament/Actions/ListLogActivitiesActionTest` (4 + 2 skip), `BaseModelBusinessLogicTest` (21), `BaseModelBusinessLogicPestTest` (19), `ResourceExtensionTest` (11), `LoginListenerTest` (3 + 7 skip + 1 risky).
- Falliscono per `SQLSTATE[42S02]` (tabelle assenti in `quaeris_data_test` e `quaeris_user_test`): `ActivityManagementTest`, `SnapshotBusinessLogicTest`, `ActivityEventSourcingTest`, `ActivityBusinessLogicTest`, `StoredEventBusinessLogicTest`, `ActivityTest`, `ActivityIntegrationTest`. Il loro comportamento con DB non e' verificato.
- Prova A/B sul `TestCase` (versione di HEAD contro quella ripristinata) su quattro file non del bucket: `ActivityBusinessLogicTest` in `Unit/Models` passa da 5 falliti a 5 passati, `ActivityLoggerTest` da 16 falliti a 15; gli altri due uguali. Nessun peggioramento.

## Decisioni aperte

1. **Quale linea dei test e' canonica.** Il pull ha sovrascritto `c49eef12` con una linea precedente. Se la prossima sync dei sottomoduli la riporta, tornano 605 errori. Serve allineare il ramo remoto (`laraxot/dev`) a `c49eef12` o accettare di rifare questo passaggio.
2. **`LoginListener::handle()` e' un segnaposto.** `LogUserLoginAction` esiste ma nessun listener la chiama; `LogoutListener` invece registra. La story 4.1 dice che i listener Login/Logout sono "gia' collegati". Decidere se il login va tracciato: se si', i 7 stub si riscrivono su `handle(Login $event)`.
3. **Pest non carica `tests/Pest.php` dei moduli** con `pest <file>`: gli helper di `PestHelpers.php` risultano non definiti (13 test non del bucket falliscono con "Call to undefined function ...mockeryExpect()" o `activityCreateUser()`). PHPStan li vede, il runtime no. Il root `laravel/Pest.php` li richiede ma Pest legge `laravel/tests/Pest.php`.
4. **Database di test vuoti.** Senza tabelle in `quaeris_data_test`/`quaeris_user_test` quasi tutti i test con scrittura non sono verificabili. Regola di progetto: non creare migration o tabelle senza chiedere.
5. **Errori di boot non legati al bucket.** 27 test falliscono con "bootIfNotBooted ... while it is being booted" su `Activity`, 11 con `EventSubscriber` e `$storedEventRepository`, 9 con "Target class [config] does not exist". Non cambiano con il `TestCase` ripristinato; da indagare a parte.

## Blocchi cross-modulo

Nessuno. Per `Model::factory()` il modulo Xot ha gia' un resolver (`XotServiceProvider::registerFactoryNameResolver()`, `Factory::guessFactoryNamesUsing`): fino a poco prima il tipo era `*ERROR*`/`mixed` perche' Larastan non trovava una factory per i modelli dei moduli (richiede `newFactory()` tipizzato o la convenzione di Laravel, e `HasXotFactory` non ha piu' `newFactory()`). I test ripristinati usano la factory concreta (`ActivityFactory::new()`), come nella forma di `c49eef12`: non e' una riscrittura di `::factory()` ma il ripristino della forma storica, e la misura finale (0 errori) non dipende dal resolver. Ri-misurato dopo la nota della lane user-b: ancora 0 sul bucket e su `Modules/Activity`.

## Wave TSV `.cursor-scratch/phpstan-wave/Activity.tsv` (2026-10-20 sera)

Lane su 18 path del TSV: assert tautologici / empty closure / unused / parent policy allineati a `UserBasePolicy` (non `ActivityBasePolicy` per `StoredEventPolicy`). Verifica: `flock /tmp/phpstan-gate.lock` + phpstan sui path TSV → `0 file_errors`, banner `[OK] No errors`. Nessun edit a `phpstan.neon`, nessun commit.

| File | Scopo (1 frase) |
|------|-----------------|
| `tests/Feature/FilamentTest.php` | Contratto Filament Resource/Action/Page del modulo Activity |
| `tests/Unit/Actions/LogModelCreatedActionTest.php` | Action che registra creazione modello su activity log |
| `tests/Unit/Actions/RestoreActivityActionTest.php` | Action di restore stato da activity |
| `tests/Unit/EventSourcingBusinessLogicTest.php` | Replay eventi e ricostruzione stato aggregato |
| `tests/Unit/Filament/ListLogActivitiesDeepCoverageTest.php` | Copertura edge ListLogActivities (resolve, label map) |
| `tests/Unit/Filament/ListLogActivitiesRemainingCoverageTest.php` | Residui copertura createFieldLabelMap / paginator |
| `tests/Unit/ListLogActivitiesActionTest.php` | Action Filament lista log (icon/name/color) |
| `tests/Unit/ListLogActivitiesPageCoverageTest.php` | Notifiche restore success/failure della page |
| `tests/Unit/ListLogActivitiesPageTest.php` | Contratto astratto page + trait CanPaginate |
| `tests/Unit/Listeners/ActivityListenersTest.php` | Listener login/logout istanziabili |
| `tests/Unit/Listeners/LogoutListenerTest.php` | Registrazione e firma handle(Logout) |
| `tests/Unit/Models/BaseModelTest.php` | BaseModel connection `activity` + parent Xot |
| `tests/Unit/Models/OtherModelsTest.php` | Snapshot/StoredEvent/BaseModel istanziabili |
| `tests/Unit/Models/Policies/ActivityPolicyTest.php` | Policy Activity/Snapshot/StoredEvent sotto UserBasePolicy |
| `tests/Unit/Models/SnapshotBusinessLogicTest.php` | Contratto Snapshot event-sourcing |
| `tests/Unit/Providers/ProvidersTest.php` | Service/Event/Route provider del modulo |
| `tests/Unit/SnapshotPolicyTest.php` | Permessi SnapshotPolicy |
| `tests/Unit/StoredEventPolicyTest.php` | Permessi StoredEventPolicy |

## Docs toccate


- [testcase.md](../testcase.md): riscritta (descriveva `ensureTestDatabasesExist()` e un flag `$migrated` che nel codice non esistono; `connectionsToTransact` con `mysql` invece di `sqlite`).
- [wiki/concepts/testcase-hierarchy-architecture.md](../wiki/concepts/testcase-hierarchy-architecture.md): connessioni, provider ed esempio allineati al `TestCase`; riferimento `related` rotto verso Xot ripuntato a `BRAINSTORM-TestCase-Hierarchy-XotBase.md`.
- [tests/phpstan-pest-fixes.md](../tests/phpstan-pest-fixes.md): note sulle sezioni 3 e 4, ormai non vere, e tre link rotti corretti.
- [00-INDEX.md](../00-INDEX.md): questa story, `testcase.md` e il conteggio delle story (37 file; l'indice diceva 40).
- `README.md` (riga Test: 100 file `*Test.php`, 34 fixture, `XotBaseTestCase`, SQLite condiviso) e `testing-rules.md` (ogni `TestCase` estende `XotBaseTestCase`) erano diventate false con il pull e sono tornate vere: verificate, non modificate.

### Duplicati segnalati, non toccati

- Architettura del TestCase: `BRAINSTORM-TestCase-Architecture.md`, `BRAINSTORM-TestCase-Architecture-laravel-modules.md`, `brainstorm-test-case-architecture.md`, `brainstorm-testcase-architecture.md`, `brainstorm-test-case-architecture-laravel-modules.md`, `brainstorm-testcase-architecture-laravel-modules.md` (sei varianti del nome); canonica: `wiki/concepts/testcase-hierarchy-architecture.md`.
- Correzioni del TestCase e dei database di test: `testcase-sqlite-to-mysql-fix.md` e `testing-testcase-database-connection-fix.md`; `testing-coverage-policy.md` esiste anche in `wiki/testing/`.
- `00-INDEX.md` cita ancora il modulo `Fixcity`, che in questo progetto non c'e' (i moduli sono condivisi tra progetti); il link `../../Fixcity/docs/README.md` non si risolve qui.
