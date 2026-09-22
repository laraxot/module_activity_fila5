# Graph Report - .  (2026-08-04)

## Corpus Check
- cluster-only mode — file stats not available

## Summary
- 732 nodes · 1140 edges · 121 communities (111 shown, 10 thin omitted)
- Extraction: 98% EXTRACTED · 2% INFERRED · 0% AMBIGUOUS · INFERRED: 28 edges (avg confidence: 0.8)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `926fc8d3`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- FilamentTest.php
- composer.json
- Illuminate\Database\Seeder
- Modules\Xot\Contracts\UserContract
- CanPaginate.php
- devDependencies
- ListLogActivities
- ListLogActivitiesAction.php
- Spatie\QueueableAction\QueueableAction
- Illuminate\Database\Eloquent\Model
- Illuminate\Database\Eloquent\Factories\Factory
- Modules\User\Models\User
- Illuminate\Database\Eloquent\Collection
- scripts
- BaseModel
- EventServiceProvider.php
- Activity
- Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable
- Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm
- Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist
- ActivityRecorder.php
- ActivityEvent.php
- HasEvents.php
- TestCase
- AdminPanelProvider.php
- PestStubs.php
- RestoreActivityAction.php
- IsActivityLogSchemaWritableAction.php
- ActivityLogSchema.php
- 2026_07_01_000000_update_activity_log_schema.php
- Dashboard.php
- fixtures/ListLogActivitiesActionTestResource.php
- fixtures/ListLogActivitiesActionTestResourceSimple.php
- list-log-activities.blade.php
- vite.config.js
- webpack.mix.js

## God Nodes (most connected - your core abstractions)
1. `Activity` - 55 edges
2. `ListLogActivities` - 23 edges
3. `ActivityLogger` - 15 edges
4. `BaseModel` - 15 edges
5. `ActivityLogger` - 14 edges
6. `scripts` - 12 edges
7. `CanPaginateHarness` - 12 edges
8. `keywords` - 10 edges
9. `ActivityPolicy` - 8 edges
10. `SnapshotPolicy` - 8 edges

## Surprising Connections (you probably didn't know these)
- `activityCreateActivity()` --calls--> `ActivityFactory`  [INFERRED]
  tests/PestHelpers.php → database/factories/ActivityFactory.php
- `makeListLogActivitiesPage()` --references--> `ListLogActivities`  [EXTRACTED]
  tests/Unit/ListLogActivitiesPageTest.php → app/Filament/Pages/ListLogActivities.php
- `TestBaseModel` --inherits--> `BaseModel`  [EXTRACTED]
  tests/fixtures/TestBaseModel.php → app/Models/BaseModel.php
- `TestBaseModel` --inherits--> `BaseModel`  [EXTRACTED]
  tests/Fixtures/TestBaseModel.php → app/Models/BaseModel.php
- `TestActivityModel` --inherits--> `BaseModel`  [EXTRACTED]
  tests/Feature/TestActivityModel.php → app/Models/BaseModel.php

## Import Cycles
- None detected.

## Communities (121 total, 10 thin omitted)

### Community 0 - "FilamentTest.php"
Cohesion: 0.06
Nodes (20): ActivityResource, CreateActivity, EditActivity, ListActivities, CreateSnapshot, EditSnapshot, ListSnapshots, SnapshotResource (+12 more)

### Community 1 - "composer.json"
Cohesion: 0.04
Nodes (47): dealerdirect/phpcodesniffer-composer-installer, pestphp/pest-plugin, wikimedia/composer-merge-plugin, authors, autoload, autoload-dev, psr-4, psr-4 (+39 more)

### Community 2 - "Illuminate\Database\Seeder"
Cohesion: 0.08
Nodes (14): Snapshot, StoredEvent, ActivityFactory, ActivityDatabaseSeeder, ActivityMassSeeder, ActivitySeeder, SnapshotSeeder, StoredEventSeeder (+6 more)

### Community 3 - "Modules\Xot\Contracts\UserContract"
Cohesion: 0.10
Nodes (8): ActivityBasePolicy, ActivityPolicy, SnapshotPolicy, StoredEventPolicy, Illuminate\Auth\Access\HandlesAuthorization, Modules\User\Models\Policies\UserBasePolicy, Modules\Xot\Contracts\UserContract, policyBefore()

### Community 4 - "CanPaginate.php"
Cohesion: 0.11
Nodes (18): getDefaultRecordsPerPageSelectOption(), getPaginationPageName(), getPerPageSessionKey(), getRecordsPerPage(), getRecordsPerPageSelectOptions(), getTablePage(), paginateQuery(), updatedRecordsPerPage() (+10 more)

### Community 5 - "devDependencies"
Cohesion: 0.06
Nodes (33): autoprefixer, axios, dotenv, dotenv-expand, laravel-vite-plugin, lodash, devDependencies, autoprefixer (+25 more)

### Community 6 - "ListLogActivities"
Cohesion: 0.11
Nodes (13): ListLogActivities, Notification, PaginationMode, Filament\Notifications\Notification, Filament\Pages\Concerns\InteractsWithFormActions, Filament\Resources\Pages\Concerns\InteractsWithRecord, Illuminate\Contracts\Pagination\LengthAwarePaginator, Illuminate\Support\Collection (+5 more)

### Community 7 - "ListLogActivitiesAction.php"
Cohesion: 0.10
Nodes (10): ListLogActivitiesAction, ActivityServiceProvider, RouteServiceProvider, Filament\Resources\Pages\ListRecords, Modules\Xot\Filament\Actions\XotBaseAction, Modules\Xot\Providers\XotBaseRouteServiceProvider, Modules\Xot\Providers\XotBaseServiceProvider, self (+2 more)

### Community 8 - "Spatie\QueueableAction\QueueableAction"
Cohesion: 0.12
Nodes (9): ActivityMaintenanceAction, LogUserLoginAction, GetActivitiesByTypeAction, GetActivityStatisticsAction, GetModelActivitiesAction, GetRecentActivitiesAction, GetUserActivitiesAction, RedactModelAttributesAction (+1 more)

### Community 9 - "Illuminate\Database\Eloquent\Model"
Cohesion: 0.12
Nodes (9): LogActivityAction, LogModelCreatedAction, LogModelDeletedAction, LogModelUpdatedAction, Illuminate\Database\Eloquent\Model, LogActivityActionTestModel, LogModelCreatedActionTestModel, LogModelDeletedActionTestModel (+1 more)

### Community 11 - "Illuminate\Database\Eloquent\Factories\Factory"
Cohesion: 0.10
Nodes (9): TestModel, BaseActivityFactory, static, static, SnapshotFactory, static, StoredEventFactory, TestModelFactory (+1 more)

### Community 12 - "Modules\User\Models\User"
Cohesion: 0.19
Nodes (6): ActivityLogger, LogUserLogoutAction, Modules\User\Models\User, createActionsTestUser(), activityCreateUser(), createActivityLifecycleUser()

### Community 14 - "scripts"
Cohesion: 0.11
Nodes (18): scripts, analyse, build, clear, format, lint, post-autoload-dump, post-update-cmd (+10 more)

### Community 15 - "BaseModel"
Cohesion: 0.17
Nodes (5): BaseModel, Modules\Xot\Models\XotBaseModel, TestActivityModel, TestBaseModel, TestBaseModel

### Community 16 - "EventServiceProvider.php"
Cohesion: 0.18
Nodes (5): LoginListener, LogoutListener, EventServiceProvider, Illuminate\Auth\Events\Logout, Illuminate\Foundation\Support\Providers\EventServiceProvider

### Community 17 - "Activity"
Cohesion: 0.21
Nodes (4): RecordSubjectActivityAction, Activity, Spatie\Activitylog\Models\Activity, activityCreateActivity()

### Community 18 - "Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable"
Cohesion: 0.21
Nodes (5): ActivitiesTable, ActivitysTable, SnapshotsTable, StoredEventsTable, Modules\Xot\Filament\Resources\Tables\XotBaseResourceTable

### Community 19 - "Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm"
Cohesion: 0.27
Nodes (4): ActivityForm, SnapshotForm, StoredEventForm, Modules\Xot\Filament\Resources\Schemas\XotBaseResourceForm

### Community 20 - "Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist"
Cohesion: 0.27
Nodes (4): ActivityInfolist, SnapshotInfolist, StoredEventInfolist, Modules\Xot\Filament\Resources\Schemas\XotBaseResourceInfolist

### Community 21 - "ActivityRecorder.php"
Cohesion: 0.29
Nodes (3): GetSubjectActivityLogAction, ActivityRecorder, Modules\Activity\Models\Contracts\ActivityRecorderContract

### Community 22 - "ActivityEvent.php"
Cohesion: 0.36
Nodes (4): ActivityEvent, Illuminate\Broadcasting\InteractsWithSockets, Illuminate\Foundation\Events\Dispatchable, Illuminate\Queue\SerializesModels

### Community 23 - "HasEvents.php"
Cohesion: 0.36
Nodes (5): snapshots(), storedEvents(), Illuminate\Database\Eloquent\Relations\MorphMany, Modules\Activity\Traits\HasEvents, HasEventsDummyModel

### Community 24 - "TestCase"
Cohesion: 0.29
Nodes (5): Illuminate\Foundation\Application, Illuminate\Foundation\Testing\DatabaseTransactions, Modules\Activity\Filament\Pages\ListLogActivities, Modules\Xot\Tests\XotBaseTestCase, TestCase

### Community 25 - "AdminPanelProvider.php"
Cohesion: 0.53
Nodes (3): AdminPanelProvider, Filament\Panel, Modules\Xot\Providers\Filament\XotBasePanelProvider

### Community 26 - "PestStubs.php"
Cohesion: 0.53
Nodes (5): Illuminate\Contracts\Auth\Authenticatable, Illuminate\Testing\TestResponse, Livewire\Features\SupportTesting\Testable, actingAs(), livewire()

### Community 30 - "2026_07_01_000000_update_activity_log_schema.php"
Cohesion: 0.83
Nodes (3): down(), resolveConnection(), up()

## Knowledge Gaps
- **70 isolated node(s):** `name`, `description`, `laraxot`, `laravel`, `filament` (+65 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **10 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `Activity` connect `Activity` to `Illuminate\Database\Seeder`, `CanPaginate.php`, `ListLogActivities`, `Spatie\QueueableAction\QueueableAction`, `Illuminate\Database\Eloquent\Model`, `Modules\User\Models\User`, `Illuminate\Database\Eloquent\Collection`, `ActivityRecorder.php`?**
  _High betweenness centrality (0.066) - this node is a cross-community bridge._
- **Why does `ListLogActivities` connect `ListLogActivities` to `CanPaginate.php`?**
  _High betweenness centrality (0.021) - this node is a cross-community bridge._
- **Why does `BaseModel` connect `BaseModel` to `TestCase.php`?**
  _High betweenness centrality (0.017) - this node is a cross-community bridge._
- **Are the 8 inferred relationships involving `Activity` (e.g. with `.execute()` and `.execute()`) actually correct?**
  _`Activity` has 8 INFERRED edges - model-reasoned connections that need verification._
- **What connects `name`, `description`, `laraxot` to the rest of the system?**
  _70 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `FilamentTest.php` be split into smaller, more focused modules?**
  _Cohesion score 0.05727644652250146 - nodes in this community are weakly interconnected._
- **Should `composer.json` be split into smaller, more focused modules?**
  _Cohesion score 0.041666666666666664 - nodes in this community are weakly interconnected._