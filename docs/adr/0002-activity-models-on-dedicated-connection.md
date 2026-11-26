---
title: "ADR — I modelli di Activity usano la connessione 'activity', mai quella di default"
type: decision
status: accepted
module: Activity
tags: [adr, activity, database, connection, multi-tenant, testing]
created: 2026-11-24
updated: 2026-11-26
related:
  - ../../app/Models/BaseModel.php
  - ../../app/Models/Activity.php
  - ../../../Tenant/app/Providers/TenantServiceProvider.php
  - ../../tests/Unit/BaseModelTest.php
qmd: "activity models on dedicated connection modelli"
decision-makers: [team back office]
---

# ADR: i modelli di Activity usano la connessione `activity`

## Contesto

- Ogni modulo ha una connessione col proprio nome: `TenantServiceProvider::aliasModuleConnectionsToDefault()` registra
  `DB::extend('<modulo>')`, che è un alias della connessione di default finché la configurazione è la stessa e apre un
  database separato quando il progetto lo configura.
- Il log delle attività cresce più di ogni altra tabella (una riga per create/update/delete, login, logout) e contiene
  dati personali: un progetto può volerlo in un database a parte.
- I test transazionali annullano solo le connessioni elencate: `tests/TestCase.php` ha
  `$connectionsToTransact = ['sqlite', 'activity', 'user']`.
- Un agente che "semplifica" vede `protected $connection = 'activity'` come ridondante e lo toglie o lo mette a `null`
  (documentato in nota `docs/basemodel-connection-why-activity-not-null.md`, cancellata nel commit `ff38a275` del repo del modulo e recuperabile con `git -C laravel/Modules/Activity show ff38a275^:docs/basemodel-connection-why-activity-not-null.md`).

Domanda: su quale connessione stanno `Activity`, `Snapshot`, `StoredEvent` e i modelli del modulo?

## Driver della decisione

- Il log delle attività cresce più di ogni altra tabella e contiene dati personali: un progetto può volerlo in un database a parte.
- Ogni modulo ha una connessione col proprio nome, alias della default finché la configurazione coincide (`TenantServiceProvider::aliasModuleConnectionsToDefault()`).
- I test transazionali annullano solo le connessioni elencate: `tests/TestCase.php` riga 61 ha `['sqlite', 'activity', 'user']`.
- Chi «semplifica» vede `protected $connection = 'activity'` come ridondante e lo toglie (documentato nella nota `basemodel-connection-why-activity-not-null.md`, cancellata nel commit `ff38a275`).

## Alternative scartate

- `$connection = null`: tutto sulla default; si perde la possibilità di separare il log e, nei test, le scritture su
  una connessione non transatta restano nel database.
- Connessione letta da config (`activitylog.database_connection`): è la via di Spatie, ma vale solo per i suoi modelli e
  il default (`ACTIVITY_LOGGER_DB_CONNECTION` vuoto) è la connessione di default, non quella del modulo.

## Decisione

- `app/Models/BaseModel.php`, `Activity.php`, `Snapshot.php`, `StoredEvent.php` dichiarano `protected $connection = 'activity'`.
- Nessun modello del modulo usa `null` (= default): un modello nuovo estende `BaseModel` ed eredita la connessione.

## Conseguenze

- Pro: separare il log in un altro database è solo configurazione; rollback dei test coerente.
- Contro: due vie di scrittura possono divergere. `config/activitylog.php` del progetto ha
  `activity_model = Spatie\Activitylog\Models\Activity` e `database_connection` da env (vuoto = default): il trait
  `LogsActivity` e l'helper `activity()` (usato per esempio nella registrazione utente) scrivono sulla connessione di
  default con il modello di Spatie, mentre il pannello legge con `Modules\Activity\Models\Activity` su `activity`. Finché
  `activity` è un alias della default è la stessa tabella; con un database separato non lo è più.
- Debito: `IsActivityLogSchemaWritableAction` controlla la connessione di `activitylog.database_connection`, non `activity`.

## Stato attuale

Il codice segue la decisione, con due scarti trovati leggendo il codice il 2026-11-26 (Pest non eseguito):

- Conseguenze descrive `config/activitylog.php` di root (`activity_model = Spatie\Activitylog\Models\Activity`, riga 3 e 40). Il tenant del progetto lo sovrascrive: `config/local/fixcity/activitylog.php` ha `use Modules\Activity\Models\Activity` (riga 3) e `activity_model => Activity::class` (riga 41), e `TenantServiceProvider::mergeConfigs()` applica la config del tenant sopra le altre. In FixCity `LogsActivity` e `activity()` scrivono quindi con il modello del modulo, sulla connessione `activity`: le «due vie di scrittura» valgono solo per un tenant senza un proprio `activitylog.php`. `database_connection` resta `env('ACTIVITY_LOGGER_DB_CONNECTION')` in entrambi.
- `Snapshot::getConnectionName()` e il costruttore di `StoredEvent` ripiegano su `database.default` quando l'ambiente è `testing`. I due test che li leggono si contraddicono: `tests/Unit/Bootstrap/PestExtendBootstrapTest.php` riga 23 si aspetta `activity` per `Activity`, `Snapshot` e `StoredEvent`; `tests/Unit/Actions/RedactModelAttributesActionTest.php` riga 39 si aspetta `database.default` per `Snapshot` e `StoredEvent` in testing. Con `APP_ENV=testing` non possono passare entrambi, salvo `database.default = activity`.

## Conferma

- `cd laravel && vendor/bin/pest Modules/Activity/tests/Unit/BaseModelTest.php` (test «base model uses activity connection», riga 18): fallisce se il valore di default di `BaseModel::$connection` non è `activity`.
- `cd laravel && vendor/bin/pest Modules/Activity/tests/Unit/Actions/RedactModelAttributesActionTest.php` (test «modelli event-sourcing usano la connessione di default in testing», riga 39): fallisce se `(new Activity)->getConnectionName()` non è `activity`.
- Il test di `PestExtendBootstrapTest.php` riga 23 non è una conferma affidabile finché è in contraddizione con quello sopra (vedi Stato attuale).
- Review: l'allineamento tra `config/activitylog.php`, la config del tenant e la connessione `activity` non ha test.
