---
title: "Activity Module Architecture"
type: architecture
tags: [module, architecture, audit, event-sourcing]
created: 2026-07-28
updated: 2026-09-17
---

# Activity Module — Architecture

## Purpose

Provides audit trail and activity logging (`spatie/laravel-activitylog`) plus event
sourcing (`spatie/laravel-event-sourcing`). Tracks user actions, subject changes, stored
events and snapshots. See also
[wiki/concepts/queueable-action-execute-entrypoint.md](wiki/concepts/queueable-action-execute-entrypoint.md)
for the Actions map (no Services layer in this module — see `no-services-rule.md` at repo
level).

## Core components (verified against `app/`)

**Models** (`app/Models/`):
- `Activity` — audit trail entries, dedicated `activity` DB connection (`$connection = 'activity'`).
- `StoredEvent`, `Snapshot` — event sourcing store.
- `BaseModel` — shared base for this module's models.

**Actions** (`app/Actions/`):
- `LogActivityAction` — primary entrypoint for logging an event (see [api.md](./api.md)).
- `LogModelCreatedAction`, `LogModelUpdatedAction`, `LogModelDeletedAction` — Eloquent lifecycle logging.
- `LogUserLoginAction`, `LogUserLogoutAction` — auth event logging.
- `RecordSubjectActivityAction`, `RestoreActivityAction`, `RedactModelAttributesAction`, `ActivityMaintenanceAction`.

**Traits** (`app/Traits/`): `HasEvents`, `HasSnapshots`.

**Filament Resources** (`app/Filament/Resources/`): `ActivityResource`, `SnapshotResource`, `StoredEventResource`.

**Policies** (`app/Models/Policies/`): `ActivityBasePolicy`, `ActivityPolicy`, `SnapshotPolicy`, `StoredEventPolicy`.

## Database schema

Single migration owner per `database/migrations/2026_06_10_141000_create_activity_table.php`
(consolidated — see the doc comment in that file: adding new `add_*`/`update_*` migrations
for the same table is forbidden, evolve the one file and bump its timestamp instead).

- `activity_log` table (dedicated `activity` connection): `id`, `log_name`, `description`,
  `subject_id`/`subject_type` (nullable UUID morph), `causer_id`/`causer_type` (nullable UUID
  morph), `properties` (json), `attribute_changes` (json), `batch_uuid`, `event`, timestamps,
  soft deletes.
- Event sourcing tables backing `StoredEvent`/`Snapshot` (see their own migrations under
  `database/migrations/`).

## Integration points

| Component | Integration | Purpose |
|-----------|-------------|---------|
| Xot | `XotBaseMigration`, XotBase Filament classes | Shared module conventions |
| User | `Modules\User\Models\User` | Causer of activities |
| Filament | `ActivityResource`, `SnapshotResource`, `StoredEventResource` | Admin UI |
| spatie/laravel-activitylog | Core dependency | Audit trail storage/query |
| spatie/laravel-event-sourcing | Core dependency | Event store, snapshots |

## Quality gates

PHPStan runs at the project's configured level via `./vendor/bin/phpstan analyse
Modules/Activity --memory-limit=-1` (see root `CLAUDE.md`/`docs/wiki` for the current
level and any module-specific baseline).

## Related documentation

- [index.md](./index.md) — full topic index of this module's docs.
- [api.md](./api.md) — `LogActivityAction` call signature.
- [structure.md](./structure.md) / [architecture/structure.md](./architecture/structure.md) — internal module layout.
