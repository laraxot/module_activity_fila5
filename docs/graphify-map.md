# Activity Module — Mappa Graphify

**Versione:** 1.0.0 | **Modulo:** Activity | **Data:** 2026-08-02

---

## 📌 Cosa fa il modulo Activity

Il modulo **Activity** gestisce:
- **Tracciamento audit trail** — registra ogni azione utente (creazione, modifica, cancellazione di modelli)
- **Event sourcing** — memorizza tutti gli eventi in StoredEvent con snapshots per performance
- **User lifecycle logging** — registra login/logout e attività associate
- **Activity querying** — fornisce azioni per recuperare attività per utente, modello, tipo
- **Activity redaction** — anonimizza attributi sensibili nei log
- **Activity restoration** — consente ripristino di attività (soft delete recovery)
- **Schema validation** — verifica che il log activity sia scrivibile prima di operazioni

---

## 🏗️ Architettura Essenziale

### Entry Points

| Tipo | Classe | Path |
|------|--------|------|
| **Model** | `Activity` | `app/Models/Activity.php` |
| **Model** | `StoredEvent` | `app/Models/StoredEvent.php` |
| **Model** | `Snapshot` | `app/Models/Snapshot.php` |
| **Action** | `ActivityLogger` | `app/Actions/ActivityLogger.php` |
| **Action** | `LogActivityAction` | `app/Actions/LogActivityAction.php` |
| **Action (Lifecycle)** | `LogModelCreatedAction` | `app/Actions/LogModelCreatedAction.php` |
| **Action (Lifecycle)** | `LogModelUpdatedAction` | `app/Actions/LogModelUpdatedAction.php` |
| **Action (Lifecycle)** | `LogModelDeletedAction` | `app/Actions/LogModelDeletedAction.php` |
| **Action (User)** | `LogUserLoginAction` | `app/Actions/LogUserLoginAction.php` |
| **Action (User)** | `LogUserLogoutAction` | `app/Actions/LogUserLogoutAction.php` |
| **Action (Query)** | `GetUserActivitiesAction` | `app/Actions/Query/GetUserActivitiesAction.php` |
| **Action (Query)** | `GetActivitiesByTypeAction` | `app/Actions/Query/GetActivitiesByTypeAction.php` |
| **Action (Query)** | `GetModelActivitiesAction` | `app/Actions/Query/GetModelActivitiesAction.php` |
| **Action (Query)** | `GetRecentActivitiesAction` | `app/Actions/Query/GetRecentActivitiesAction.php` |
| **Action (Query)** | `GetActivityStatisticsAction` | `app/Actions/Query/GetActivityStatisticsAction.php` |
| **Action (Query)** | `GetSubjectActivityLogAction` | `app/Actions/Query/GetSubjectActivityLogAction.php` |
| **Action** | `RecordSubjectActivityAction` | `app/Actions/RecordSubjectActivityAction.php` |
| **Action** | `RestoreActivityAction` | `app/Actions/RestoreActivityAction.php` |
| **Action** | `RedactModelAttributesAction` | `app/Actions/RedactModelAttributesAction.php` |
| **Action (Schema)** | `IsActivityLogSchemaWritableAction` | `app/Actions/Schema/IsActivityLogSchemaWritableAction.php` |
| **Event** | `ActivityEvent` | `app/Events/ActivityEvent.php` |
| **Listener** | `LoginListener` | `app/Listeners/LoginListener.php` |
| **Listener** | `LogoutListener` | `app/Listeners/LogoutListener.php` |
| **Trait** | `HasEvents` | `app/Traits/HasEvents.php` |
| **Service Provider** | `ActivityServiceProvider` | `app/Providers/ActivityServiceProvider.php` |
| **Service Provider** | `EventServiceProvider` | `app/Providers/EventServiceProvider.php` |
| **Filament Resource** | `ActivityResource` | `app/Filament/Resources/ActivityResource.php` |
| **Filament Resource** | `StoredEventResource` | `app/Filament/Resources/StoredEventResource.php` |
| **Filament Resource** | `SnapshotResource` | `app/Filament/Resources/SnapshotResource.php` |
| **Policy** | `ActivityPolicy` | `app/Models/Policies/ActivityPolicy.php` |
| **Policy** | `SnapshotPolicy` | `app/Models/Policies/SnapshotPolicy.php` |
| **Policy** | `StoredEventPolicy` | `app/Models/Policies/StoredEventPolicy.php` |

### Dependencies (Incoming)

```
Illuminate\Auth\Events\Login → Activity (LogUserLoginAction via LoginListener)
Illuminate\Auth\Events\Logout → Activity (LogUserLogoutAction via LogoutListener)
Other Modules (generic) → Activity (via LogActivityAction, ActivityLogger)
```

**Tipologia di dipendenza:**
- **Event-based:** Ascolta gli eventi di autenticazione Laravel
- **Action-based:** Moduli possono chiamare direttamente ActivityLogger o LogActivityAction
- **Trait-based:** Modelli possono usare `HasEvents` per event sourcing

### Dependencies (Outgoing)

```
Activity → Modules\User (User model, User contracts)
Activity → Modules\Xot (XotBaseModel, XotBaseServiceProvider, factories)
Activity → Spatie\Activitylog (SpatieActivity base model)
Activity → Spatie\EventSourcing (StoredEvent, Snapshot base classes)
Activity → Illuminate\Auth (Login, Logout events)
Activity → Filament (Admin resources, panels)
```

---

## 🔗 Relazioni Dati (Schema Logico)

### Tabelle Principali

```
activities (Activity model)
  ├── id (PK)
  ├── log_name (VARCHAR) — categoria attività (es. 'default', 'user_actions')
  ├── description (TEXT) — descrizione leggibile
  ├── subject_type (VARCHAR, FK Morph) — tipo modello soggetto
  ├── subject_id (BIGINT, FK Morph) — ID modello soggetto
  ├── causer_type (VARCHAR, FK Morph) — tipo utente che ha causato (User)
  ├── causer_id (BIGINT, FK Morph) — ID utente
  ├── properties (JSON, nullable) — dati aggiuntivi personalizzati
  ├── attribute_changes (JSON, nullable) — changeset (before/after)
  ├── batch_uuid (UUID, nullable) — gruppo operazioni atomiche
  ├── event (VARCHAR, nullable) — tipo evento specifico
  ├── created_at (TIMESTAMP)
  ├── updated_at (TIMESTAMP)
  ├── deleted_at (TIMESTAMP, nullable) — soft delete
  ├── created_by (BIGINT, FK User, nullable)
  ├── updated_by (BIGINT, FK User, nullable)
  └── deleted_by (BIGINT, FK User, nullable)

stored_events (StoredEvent model - Event Sourcing)
  ├── id (PK)
  ├── aggregate_uuid (UUID) — aggregato che genera evento
  ├── aggregate_version (INT) — versione aggregato
  ├── event_version (INT) — versione evento
  ├── event_class (VARCHAR) — FQCN della classe evento
  ├── event_properties (JSON) — payload evento
  ├── meta_data (JSON, nullable) — metadati aggiuntivi
  ├── created_at (TIMESTAMP)
  ├── updated_at (TIMESTAMP, nullable)
  ├── created_by (BIGINT, FK User, nullable)
  └── updated_by (BIGINT, FK User, nullable)

snapshots (Snapshot model - Event Sourcing)
  ├── id (PK)
  ├── aggregate_uuid (UUID) — aggregato snapshot
  ├── aggregate_version (INT) — versione aggregato al snapshot
  ├── state (JSON) — stato serializzato aggregato
  ├── created_at (TIMESTAMP)
  ├── updated_at (TIMESTAMP, nullable)
  ├── created_by (BIGINT, FK User, nullable)
  └── updated_by (BIGINT, FK User, nullable)
```

### Relazioni

```
Activity ──1:N──> User (causer_id → users.id)
Activity ──*:1──> Any Model (subject_type + subject_id polymorphic)

StoredEvent ──*:1──> Any Model (aggregate_uuid polymorphic, event sourcing pattern)

Snapshot ──*:1──> Any Model (aggregate_uuid polymorphic, event sourcing pattern)

StoredEvent ──1:N──> Snapshot (stessi aggregati possono avere snapshots)
```

---

## 🎯 Task Comuni + Graphify

### Task 1: Registrare una nuova attività utente

**Domanda Graphify:**
```bash
graphify query "Activity module how to log a new user activity"
```

**Workflow:**
1. Inietta `ActivityLogger` nel controller o azione
2. Chiama `$activityLogger->log($type, $user, $subject, $properties, $description)`
3. Restituisce istanza di `Activity` appena creata
4. Ogni log è queuable via QueueableAction

**Codice esempio:**
```php
use Modules\Activity\Actions\ActivityLogger;

$logger = resolve(ActivityLogger::class);
$activity = $logger->log(
    type: 'user_profile_updated',
    user: $user,
    subject: $profile,
    properties: ['old_name' => 'John', 'new_name' => 'Jane'],
    description: 'User updated profile'
);
```

---

### Task 2: Recuperare attività di un utente con filtri e paginazione

**Domanda Graphify:**
```bash
graphify query "Activity module query activities by user type and date range"
```

**Workflow:**
1. Usa `GetUserActivitiesAction` per attività causate da un utente
2. O usa `Activity::forSubject($model)` per attività di un modello specifico
3. Chain query con `whereEvent()`, `whereDate()`, `whereBetween()`
4. `->latest()->paginate()`

**Codice esempio:**
```php
use Modules\Activity\Actions\Query\GetUserActivitiesAction;
use Modules\Activity\Models\Activity;

// Attività dell'utente negli ultimi 30 giorni
$activities = Activity::where('causer_id', $user->id)
    ->where('causer_type', User::class)
    ->where('event', 'user_login')
    ->whereBetween('created_at', [now()->subDays(30), now()])
    ->latest()
    ->paginate(25);
```

---

### Task 3: Loggare automaticamente model lifecycle events

**Domanda Graphify:**
```bash
graphify query "Activity module automatic model lifecycle logging created updated deleted"
```

**Workflow:**
1. I listener `LogModelCreatedAction`, `LogModelUpdatedAction`, `LogModelDeletedAction` sono registrati globalmente
2. Usano model events (created, updated, deleted) di Laravel
3. Creano automaticamente entry Activity con changeset nei `attribute_changes`
4. Chi vuole opt-out deve disabilitare nel config o usare `stopAuditingModel()`

**Integrazione in config/activity.php:**
```php
'audit_models' => [
    'Modules\\User\\Models\\User',
    'Modules\\Posts\\Models\\Post',
    // ...
],
```

---

### Task 4: Restore activity e soft delete recovery

**Domanda Graphify:**
```bash
graphify query "Activity module restore activity soft delete recovery"
```

**Workflow:**
1. `RestoreActivityAction` consente ripristinare attività soft-deleted
2. Usa `Activity::withTrashed()->find($id)->restore()`
3. Utile per auditability completa (mai eliminare audit trail completamente)

**Codice esempio:**
```php
use Modules\Activity\Actions\RestoreActivityAction;

$action = resolve(RestoreActivityAction::class);
$restored = $action->execute($activityId);
```

---

### Task 5: Redact sensitive data from activity logs

**Domanda Graphify:**
```bash
graphify query "Activity module redact sensitive attributes credit card password"
```

**Workflow:**
1. `RedactModelAttributesAction` anonimizza attributi sensibili
2. Configurare whitelist/blacklist nel config
3. Sostituisce con `[REDACTED]` nel properties e attribute_changes
4. Eseguire via maintenance command periodicamente

**Codice esempio:**
```php
use Modules\Activity\Actions\RedactModelAttributesAction;

$action = resolve(RedactModelAttributesAction::class);
$action->execute(
    activity: $activity,
    attributes: ['password', 'credit_card', 'ssn']
);
```

---

### Task 6: Verificare integrità schema activity log

**Domanda Graphify:**
```bash
graphify query "Activity module check database schema writable"
```

**Workflow:**
1. Prima di operazioni critiche, usa `IsActivityLogSchemaWritableAction`
2. Verifica che le tabelle activity esistano e siano scrivibili
3. Ritorna boolean o lancia eccezione

**Codice esempio:**
```php
use Modules\Activity\Actions\Schema\IsActivityLogSchemaWritableAction;

$action = resolve(IsActivityLogSchemaWritableAction::class);
if ($action->execute()) {
    // Safe to log
} else {
    Log::warning('Activity log schema not writable');
}
```

---

### Task 7: Event Sourcing con HasEvents trait

**Domanda Graphify:**
```bash
graphify query "Activity module event sourcing HasEvents trait aggregate"
```

**Workflow:**
1. Aggiungi `HasEvents` trait a modelli che richiedono event sourcing
2. Ogni evento è una classe `ShouldBeStored`
3. Stored in `stored_events`, snapshots in `snapshots` (per performance)
4. Queryare con `Model::storedEvents()` e `Model::snapshots()`

**Codice esempio:**
```php
use Modules\Activity\Traits\HasEvents;

class Order extends Model
{
    use HasEvents;
    
    // Ora puoi:
    // $order->storedEvents() — tutti gli eventi
    // $order->snapshots() — snapshot della state
}
```

---

### Task 8: Login/Logout automatic logging

**Domanda Graphify:**
```bash
graphify query "Activity module login logout logging listeners"
```

**Workflow:**
1. `LoginListener` e `LogoutListener` registrati in `EventServiceProvider`
2. Ascoltano `Illuminate\Auth\Events\Login` e `Logout`
3. Creano automaticamente Activity entry con type 'user_login', 'user_logout'
4. Nessuna configurazione necessaria (funziona out-of-the-box)

---

### Task 9: Filament Admin - Browse activity logs

**Domanda Graphify:**
```bash
graphify query "Activity module Filament admin browse view activity logs"
```

**Workflow:**
1. Usa `ActivityResource` per lista/edit di activities
2. Usa `StoredEventResource` per event sourcing debug
3. Usa `SnapshotResource` per snapshot management
4. Risorse disponibili in Filament admin panel
5. Policies controllano read/edit/delete

**Rotte:**
- `/admin/activity/activities` — Activity list
- `/admin/activity/stored-events` — StoredEvent list
- `/admin/activity/snapshots` — Snapshot list

---

## 📊 Grafo Locale (Query Rapide)

### Scoprire Entità Core

```bash
graphify query "Activity module models actions events"
```

### Tracciare Flusso Principale

```bash
graphify path --from "LogActivityAction" --to "Activity"
graphify path --from "LoginListener" --to "Activity"
```

### Trovare Dipendenze

```bash
graphify query "Activity module dependencies Xot User"
```

### Cercare by Tipo

```bash
graphify query "Activity Actions Query*"
graphify query "Activity Listeners"
graphify query "Activity Policies"
```

---

## 🔄 Architettura Flussi

### Flusso 1: Log Manuale (ActivityLogger)

```
Code/Action
    ↓
resolve(ActivityLogger::class)
    ↓
$logger->log(type, user, subject, properties, description)
    ↓
LogActivityAction::execute()
    ↓
Activity::create([...])
    ↓
Activity (stored in activities table)
```

### Flusso 2: Model Lifecycle Automatic Logging

```
Model::created() / updated() / deleted()
    ↓
Eloquent Model Events
    ↓
LogModelCreatedAction / LogModelUpdatedAction / LogModelDeletedAction
    ↓
Activity::create([subject_type, subject_id, ...])
    ↓
Activity (stored with before/after changeset)
```

### Flusso 3: Authentication Events

```
User Login
    ↓
Illuminate\Auth\Events\Login
    ↓
LoginListener
    ↓
LogUserLoginAction
    ↓
Activity::create([type: 'user_login', ...])
    ↓
Activity

Similar for Logout → LogoutListener
```

### Flusso 4: Event Sourcing (HasEvents Trait)

```
Domain Event (ShouldBeStored)
    ↓
EventSourcing::handle()
    ↓
StoredEvent::create([event_class, event_properties, ...])
    ↓
Snapshot (periodically via AggregateSnapshot)
    ↓
Model::storedEvents() query per reconstruction
```

---

## 📋 Test Coverage Map

```bash
graphify query "Activity module test coverage"
```

### Checklist Copertura

- [x] `app/Models/Activity.php` → `tests/Unit/Models/ActivityTest.php`
- [x] `app/Models/StoredEvent.php` → `tests/Unit/Models/StoredEventTest.php`
- [x] `app/Models/Snapshot.php` → `tests/Unit/Models/SnapshotTest.php`
- [x] `app/Actions/LogActivityAction.php` → `tests/Unit/Actions/LogActivityActionTest.php`
- [x] `app/Actions/ActivityLogger.php` → `tests/Unit/Actions/ActivityLoggerTest.php`
- [x] `app/Actions/LogModelCreatedAction.php` → `tests/Unit/Actions/LogModelCreatedActionTest.php`
- [x] `app/Actions/LogModelUpdatedAction.php` → `tests/Unit/Actions/LogModelUpdatedActionTest.php`
- [x] `app/Actions/LogModelDeletedAction.php` → `tests/Unit/Actions/LogModelDeletedActionTest.php`
- [x] `app/Actions/LogUserLoginAction.php` → `tests/Unit/Actions/LogUserLoginActionTest.php`
- [x] `app/Actions/LogUserLogoutAction.php` → `tests/Unit/Actions/LogUserLogoutActionTest.php`
- [x] `app/Listeners/LoginListener.php` → (covered by LogUserLoginActionTest)
- [x] `app/Listeners/LogoutListener.php` → (covered by LogUserLogoutActionTest)
- [x] `app/Events/ActivityEvent.php` → `tests/Unit/Events/ActivityEventTest.php`
- [x] `app/Traits/HasEvents.php` → `tests/Unit/Traits/HasEventsTest.php`
- [x] `app/Models/Policies/ActivityPolicy.php` → `tests/Unit/Models/Policies/ActivityPolicyTest.php`
- [x] `app/Filament/Actions/ListLogActivitiesAction.php` → `tests/Feature/Filament/Actions/ListLogActivitiesActionTest.php`

### Test Execution

```bash
# Tutti i test del modulo
php artisan test modules/Activity/tests

# Test specifico
php artisan test modules/Activity/tests/Unit/Models/ActivityTest.php

# Con coverage
php artisan test modules/Activity/tests --coverage

# Feature tests
php artisan test modules/Activity/tests/Feature --parallel
```

---

## 🚀 Comandi Rapidi

```bash
# Esplora architettura
graphify query "Activity module architecture models actions"

# Trova flusso
graphify path --from "ActivityLogger" --to "Activity"

# Test coverage
graphify query "Activity test coverage policies actions"

# Dependencies
graphify query "Activity dependencies User Xot"

# Filament resources
graphify query "Activity Filament Resources"

# Policies
graphify query "Activity Policies authorization"

# Event sourcing
graphify query "Activity HasEvents trait event sourcing"
```

---

## 📚 Riferimenti

### Documentazione Modulo

- **Config:** `config/config.php` — configurazione modulo Activity
- **Database:** `database/migrations/` — tabelle activities, stored_events, snapshots
- **Factories:** `database/factories/` — ActivityFactory, StoredEventFactory, SnapshotFactory
- **Seeders:** `database/seeders/` — test data per sviluppo

### Link Esterni

- **Spatie Activity Log:** https://github.com/spatie/laravel-activity-log
- **Spatie Event Sourcing:** https://github.com/spatie/laravel-event-sourcing
- **Graphify Central:** `docs/graphify-integration.md`
- **Module Discipline:** `docs/wiki/rules/module-naming-discipline.md`
- **Xot Base Model:** `laravel/Modules/Xot/docs/xot-base-model.md`

### Moduli Correlati

- **User Module** (`laravel/Modules/User/`) — User model, authentication
- **Xot Module** (`laravel/Modules/Xot/`) — Base classes, factory traits
- **Notify Module** (`laravel/Modules/Notify/`) — Notifications quando attività cambiano

---

## 🔐 Security & Best Practices

### Audit Trail Integrity

- ✅ Immutability: Activities non sono editabili (soft delete solo per compliance)
- ✅ Attribution: Sempre registrare chi (causer_id) e quando (created_at)
- ✅ Polymorphic: Support multiple model types senza hardcoding
- ✅ Redaction: Sensitivi dati (password, credit card) anonimizzati via `RedactModelAttributesAction`

### Performance

- ✅ Queueable Actions: Log async via queue per non bloccare request
- ✅ Snapshots: Event sourcing snapshot ogni N eventi per query performance
- ✅ Pagination: Always paginate long activity lists
- ✅ Indexes: Database ha indici su (causer_id, created_at), (subject_type, subject_id)

### Privacy

- ✅ GDPR Compliance: Soft delete su richiesta (deleted_by, deleted_at)
- ✅ Data Export: Esportare activities di un utente via `GetUserActivitiesAction`
- ✅ Attribute Redaction: Masking field sensibili prima di storage

---

**Responsabile:** @marco76tv | **Last updated:** 2026-08-02 | **Version:** 1.0.0
