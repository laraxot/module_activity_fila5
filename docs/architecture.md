<<<<<<< HEAD
<<<<<<< .merge_file_wQuOTC
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
=======
=======
<<<<<<< HEAD
>>>>>>> a95e8f36 (.)
# Architecture Documentation

## Activity Module Architecture

### System Overview

The Activity module provides a comprehensive activity logging and event sourcing system for the Laraxot ecosystem. This document describes the module's architecture, components, and design patterns.

### Core Components

Vedi [wiki/concepts/queueable-action-execute-entrypoint.md](wiki/concepts/queueable-action-execute-entrypoint.md) per la mappa Actions attuale (no Services layer).

```
Activity Module Architecture
┌─────────────────────────────────────────────────────────────┐
│                     Activity Module                          │
├─────────────────────────────────────────────────────────────┤
│  ┌──────────────┐  ┌──────────────┐  ┌──────────────┐       │
│  │   Models     │  │ Repositories │  │  Services    │       │
│  │              │  │              │  │              │       │
│  │ ActivityLog  │  │ ActivityRepo │  │ ActivitySvc  │       │
│  │ StoredEvent  │  │ EventRepo    │  │ EventSvc     │       │
│  │ Snapshot     │  │ SnapRepo     │  │ SnapSvc      │       │
│  └──────────────┘  └──────────────┘  └──────────────┘       │
├─────────────────────────────────────────────────────────────┤
│  ┌──────────────┐  ┌──────────────┐  ┌──────────────┐       │
│  │   Events     │  │   Commands   │  │  Projections │       │
│  │              │  │              │  │              │       │
│  │ DomainEvent  │  │ CreateAct    │  │ ActivityView │       │
│  │ StoredEvt    │  │ UpdateAct    │  │ EventView    │       │
│  └──────────────┘  └──────────────┘  └──────────────┘       │
├─────────────────────────────────────────────────────────────┤
│  ┌──────────────┐  ┌──────────────┐  ┌──────────────┐       │
│  │   Policies   │  │   Actions    │  │   Pages      │       │
│  │              │  │              │  │              │       │
│  │ ActPolicy    │  │ LogAct       │  │ ActListPage  │       │
│  │ EvtPolicy    │  │ RevAct       │  │ EvtListPage  │       │
│  └──────────────┘  └──────────────┘  └──────────────┘       │
└─────────────────────────────────────────────────────────────┘
```

### Data Flow

1. **Event Creation**: User actions trigger domain events
2. **Event Storage**: Events persisted to `stored_events` table
3. **Snapshot Creation**: Aggregates create snapshots for performance
4. **Projection Update**: Read models updated via event handlers
5. **Query Handling**: Projections queried for activity listings

### Database Schema

```sql
-- Activity Logs
CREATE TABLE activity_log (
    id BIGINT PRIMARY KEY,
    log_name VARCHAR(255),
    description TEXT,
    subject_type VARCHAR(255),
    subject_id BIGINT,
    causer_type VARCHAR(255),
    causer_id BIGINT,
    properties JSON,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- Event Sourcing Tables
CREATE TABLE stored_events (
    id BIGINT PRIMARY KEY,
    event_name VARCHAR(255),
    aggregate_id VARCHAR(255),
    aggregate_type VARCHAR(255),
    event_data JSON,
    created_at TIMESTAMP
);

CREATE TABLE snapshots (
    id BIGINT PRIMARY KEY,
    aggregate_id VARCHAR(255),
    aggregate_type VARCHAR(255),
    version INTEGER,
    data JSON,
    created_at TIMESTAMP
);
```

### Design Patterns

#### 1. Repository Pattern
```php
interface ActivityRepositoryInterface
{
    public function find(int $id): ?Activity;
    public function findBySubject(string $type, int $id): Collection;
    public function paginate(int $perPage): LengthAwarePaginator;
}
```

#### 2. CQRS Pattern
- **Command Side**: Handles mutations, validates business rules
- **Query Side**: Optimized read models via projections

#### 3. Event Sourcing
```php
class ActivityCreated extends ShouldBroadcast
{
    public function __construct(
        public readonly string $activityType,
        public readonly array $data
    ) {}
}
```

#### 4. Policy-Based Authorization
```php
class ActivityPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('activities.view');
    }
}
```

### Integration Points

| Component | Integration | Purpose |
|-----------|-------------|---------|
| Xot | BaseRepository | Generic repository patterns |
| User | UserModel | User activity tracking |
| Filament | ActivityResource | Admin UI integration |
| spatie/laravel-activitylog | Third-party | Alternative logging |
| spatie/laravel-event-sourcing | Core dependency | Event sourcing engine |

### Performance Considerations

1. **Database Indexing**: Composite indexes on `subject_type`, `causer_type`
2. **Caching**: Redis cache for activity counts (TTL: 5 minutes)
3. **Pagination**: Cursor-based pagination for large datasets
4. **Archiving**: Old events archived to separate table

### Scaling Strategy

- **Horizontal**: Read replicas for query-heavy operations
- **Vertical**: Index optimization for write-heavy periods
- **Event Sourcing**: Enables temporal querying and replay

### Extension Points

1. **Event Handlers**: Add custom handlers via service container
2. **Projectors**: Create new projections for specialized views
3. **Middleware**: Add activity logging middleware to routes
4. **Custom Events**: Extend base event classes

### Related Documentation

- [Security](SECURITY.md)
- [Quality](QUALITY.md)
- [Performance](PERFORMANCE.md)
- [Testing](TESTING.md)
<<<<<<< HEAD
=======
=======
>>>>>>> a95e8f36 (.)
---
title: "Activity Module Architecture"
type: architecture
tags: [module, architecture, audit]
created: 2026-07-28
updated: 2026-07-28
---

# Activity Module — Architecture

## Purpose
Provides audit trail and activity logging via Spatie Laravel Activity Log. Tracks user actions, subject changes, and event sourcing.

## Core Components

**Models:**
- `Activity` — Base activity log model (spatie/laravel-activitylog)

**Actions:**
- `LogActivityAction` — Primary entrypoint for logging events

**Filament Resources:**
- `ActivityResource` — Browse/analyze activity logs

## Database Schema
- `activities` table: id, log_name, description, subject_id, subject_type, causer_id, causer_type, properties, created_at

## Quality Gates
✅ PHPStan L10: Executed (2026-07-28)
<<<<<<< HEAD
>>>>>>> .merge_file_Da4mgP
=======
>>>>>>> laraxot/dev
>>>>>>> a95e8f36 (.)
