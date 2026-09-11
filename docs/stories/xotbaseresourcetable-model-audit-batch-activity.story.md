---
title: XotBaseResourceTable model audit — batch-activity
slug: xotbaseresourcetable-model-audit-batch-activity
status: done
scope: module:Activity
github_issue: https://github.com/laraxot/module_activity_fila5/issues/49
date: 2026-09-11
---

# Story: XotBaseResourceTable model audit (batch-activity)

## Status: Done

## Context

Audit cross-modulo (batch parallelo, nome batch `batch-activity`) su tutte le classi
`XotBaseResourceTable` del modulo Activity: verifica della property `$model`, verifica
delle colonne di `getTableColumns()` contro lo schema reale, migliorie UX additive a
basso rischio. Nessuna operazione distruttiva, nessun file fuori scopo toccato.

## File in scope

- `app/Filament/Resources/ActivityResource/Tables/ActivitiesTable.php`
- `app/Filament/Resources/ActivityResource/Tables/ActivitysTable.php`
- `app/Filament/Resources/SnapshotResource/Tables/SnapshotsTable.php`
- `app/Filament/Resources/StoredEventResource/Tables/StoredEventsTable.php`

## Task 1 — `protected static string $model`

Verificato contro le Resource sorelle (fonte autorevole):

| File | Model dichiarato | Resource sorella | Model in Resource | Esito |
|---|---|---|---|---|
| `ActivitiesTable` | `Modules\Activity\Models\Activity` | `ActivityResource` | `Activity::class` | gia' corretto, nessuna modifica |
| `ActivitysTable` | `Modules\Activity\Models\Activity` | `ActivityResource` | `Activity::class` | gia' corretto, nessuna modifica |
| `SnapshotsTable` | `Modules\Activity\Models\Snapshot` | `SnapshotResource` | `Snapshot::class` | gia' corretto, nessuna modifica |
| `StoredEventsTable` | `Modules\Activity\Models\StoredEvent` | `StoredEventResource` | `StoredEvent::class` | gia' corretto, nessuna modifica |

Tutti e 4 i file avevano gia' `protected static string $model = X::class;` con il
valore corretto (con tanto di `@var class-string<X>` phpdoc). Nessuna azione richiesta
per il Task 1.

## Task 2 — verifica colonne vs schema reale

Colonne lette in sola lettura via tinker (`Schema::getColumnListing()`), nessuna
scrittura sul DB:

- `Activity` → tabella `activity_log` (connessione `activity`): `id, log_name,
  description, subject_type, subject_id, causer_type, causer_id, properties,
  batch_uuid, event, created_at, updated_at, updated_by, created_by, deleted_at,
  deleted_by, attribute_changes`.
- `Snapshot` → tabella `snapshots`: `id, aggregate_uuid, aggregate_version, state,
  created_at, updated_at, updated_by, created_by`.
- `StoredEvent` → tabella `stored_events`: `id, aggregate_uuid, aggregate_version,
  event_version, event_class, event_properties, meta_data, created_at, updated_by,
  created_by` (nota: **niente `updated_at`** su questa tabella).

Tutte le chiavi dirette (senza punto, quindi non relazioni) usate nei 4
`getTableColumns()` esistono nello schema reale corrispondente. Nessuna colonna
sospetta/rimossa trovata. Nessuna relazione (chiave con punto) presente in questi 4
file, quindi nessun salto da segnalare.

## Task 3 — migliorie UX additive (basso rischio)

- `ActivitiesTable.php`:
  - `log_name` → aggiunto `->sortable()` (era solo `searchable()`).
  - `event` → aggiunto `->sortable()` (era solo `searchable()`).
  - `batch_uuid` → aggiunto `->copyable()` (e' un UUID, stesso pattern gia' usato per
    `aggregate_uuid` in `SnapshotsTable`/`StoredEventsTable`).
  - `updated_at` → aggiunto `->sortable()` (simmetria con `created_at`, che gia' lo
    aveva).
- `ActivitysTable.php`:
  - `log_name` → aggiunto `->sortable()`, per coerenza con `ActivitiesTable` (vedi
    nota dead-code sotto: file toccato ma verosimilmente non renderizzato mai).
- `SnapshotsTable.php`:
  - `id` → aggiunto `->searchable()` (aveva gia' `sortable()`+`toggleable()`), per
    coerenza con `ActivitiesTable.id`.
- `StoredEventsTable.php`:
  - `id` → aggiunto `->searchable()` (stesso motivo).

Nessuna colonna rimossa. Nessuna nuova classe Column condivisa creata (regola del
batch: non introdurre `PersonColumn`-like nuove in questo giro).
Una chiave per riga rispettata in tutti gli array toccati (gia' cosi' nei file
originali).

## Dead code segnalato (NON rimosso)

`Modules\Xot\Filament\Resources\XotBaseResource::getTableClass()` risolve la classe
table per convenzione:

```php
$name = Str::plural(class_basename(static::getModel()));
$class = static::class.'\Tables\\'.$name.'Table';
```

Per `Activity`, `Str::plural('Activity')` restituisce `'Activities'` (verificato con
`php artisan tinker`), quindi la classe realmente risolta e usata da
`ActivityResource::table()` e' **`ActivitiesTable`**. `ActivitysTable` (con il typo
singolare "Activitys") non e' risolta da nessuna convenzione e non e' referenziata
esplicitamente da nessun altro file del modulo (`grep -rn "ActivitysTable"
app/` non trova nulla fuori dal file stesso). E' dead code. Non cancellata in questo
giro (fuori scopo del batch, decisione lasciata a un passaggio successivo), ma
migliorata in coerenza con la sorella viva nel caso venga effettivamente wired in
futuro.

## Verifica eseguita

- `php -l` su tutti e 4 i file: nessun errore di sintassi.
- `cd laravel && vendor/bin/phpstan analyse <4 file> --no-progress`: `[OK] No errors`.
- Nessun comando di scrittura sul DB eseguito (solo `Schema::getColumnListing`
  in tinker, sola lettura).

## GitHub

Issue di tracking: laraxot/module_activity_fila5#49 (creata con questo stesso
riepilogo, nessuna issue preesistente trovata con `gh search issues
"xotbaseresourcetable-model-audit" --owner laraxot`).

## File Toccati

- `app/Filament/Resources/ActivityResource/Tables/ActivitiesTable.php`
- `app/Filament/Resources/ActivityResource/Tables/ActivitysTable.php`
- `app/Filament/Resources/SnapshotResource/Tables/SnapshotsTable.php`
- `app/Filament/Resources/StoredEventResource/Tables/StoredEventsTable.php`
