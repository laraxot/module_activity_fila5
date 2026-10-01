<<<<<<< .merge_file_tTLpcO
<<<<<<< .merge_file_oPoQaH
---
title: "Activity — architettura BMAD"
type: concept
tags: [architecture, activity, audit, log, event-sourcing, spatie]
created: 2026-09-28
updated: 2026-09-28
qmd: "Activity architettura moduli Spatie activity event sourcing log viewer contratti modelli"
related:
  - ./architecture/module-boundary.md
  - ./architecture/module-map.md
  - ./brainstorming.md
  - ./epics/module-roadmap.md
  - ./README.md
issues: []
discussions: []
---

# Activity — architettura BMAD

> **SUMMARY**: mappa reale del modulo `Modules/Activity` (alias `activity`): due
> sottosistemi distinti — audit delle azioni utente su Spatie Activity + event
> sourcing, e un visualizzatore dei log di file Laravel — con tre Resource
> Filament, 29 Action e 7 DTO.

## Identita del modulo

Da `module.json`: alias `activity`, `requires: ["Xot", "User"]`, `order: 5`,
priority 0, `minimumCoreVersion 10.0`, `phpVersion ^8.1`. Da `config/config.php`:
rotte abilitate con middleware `web, auth`, navigation `sort: 20`.

## Modelli (`app/Models`)

| Classe | Base | Ruolo |
|---|---|---|
| `Activity` | `Spatie\Activitylog\Models\Activity` (`SpatieActivity`) | una riga di audit per azione su modello; `properties` castata a `SchemalessAttributes` |
| `StoredEvent` | `Spatie\EventSourcing\StoredEvents\Models\EloquentStoredEvent` | evento persistito per replay; `meta_data` schemaless |
| `Snapshot` | `Spatie\EventSourcing\Snapshots\EloquentSnapshot` | snapshot Eloquent per proiezioni |
| `BaseModel` | — | base interna del modulo |
| `TestModel` | — | appoggio ai test (tabella `test_models`, migrazione 2026_03_05) |

Tutti i modelli di dominio usano `Modules\Xot\Models\Traits\HasXotFactory` e una
factory in `database/factories/` (`ActivityFactory`, `SnapshotFactory`,
`StoredEventFactory`). `app/Models/Contracts/ActivityRecorderContract.php`
e il **contratto pubblico** del modulo.

## Contratti e adattatori

- `app/Contracts/ActivityRecorderContract.php` — `record(class-string, int|string, create|update|delete|restore, array $changes)` e `getLog(string, int|string): array`. Il docblock impone: *"Modules should dispatch ActivityRecorded events instead of calling this directly"*.
- `app/Contracts/ActivityRecorderInterface.php` — interfaccia gemella non vincolata al tipaggio stretto.
- `app/Adapters/ActivityRecorder.php` e `app/Adapters/ActivityLogger.php` — implementazioni concrete.

## Action — tre famiglie distinte

**Query (`app/Actions/Query`, 6)** — letture per il pannello: `GetActivitiesByTypeAction`,
`GetActivityStatisticsAction`, `GetModelActivitiesAction`, `GetRecentActivitiesAction`,
`GetSubjectActivityLogAction`, `GetUserActivitiesAction`.

**Log (`app/Actions/Log`, 10)** — il visualizzatore dei log di file:
`ResolveLogDirectoryAction`, `ResolveLogFilePathAction`, `ListLogFilesAction`,
`BuildLogFileTreeAction`, `ReadLogTailAction`, `DownloadLogFileAction`,
`FilterLogEntriesAction`, `ParseLogEntriesAction`, `BuildLogViewerStateAction`,
`AuthorizeLogAccessAction`.

**Schema (`app/Actions/Schema`, 2)** — `CheckActivityLogWritableAction` e
`IsActivityLogSchemaWritableAction`: verificano se la tabella di audit e la
struttura del log sono scrivibili prima di tentare l'operazione.

## DTO (`app/Datas`, 7)

`FilteredLogEntriesData`, `LogEntryData`, `LogFileData`, `LogTailData`,
`LogTreeData`, `LogViewerStateData`, `ResolvedLogFileData` — coprono l'intero
flusso del log viewer: risoluzione percorso -> lista -> albero -> tail ->
parsing -> filtro -> stato UI.

## Filament (`app/Filament`)

Tre Resource, ciascuna con schema e table separati in sottodirectory proprie:
`ActivityResource`, `SnapshotResource`, `StoredEventResource`. Presenti
`app/Filament/Pages` (con `Pages/Concerns`), `Forms`, `Forms/Components` e `Actions`.

## Provider (`app/Providers`)

`ActivityServiceProvider` (registrato in `module.json` e `config/config.php`),
`EventServiceProvider`, `RouteServiceProvider`, e
`Filament/AdminPanelProvider` (registrato solo in `module.json`).

## Migrazioni (16 file in `database/migrations`)

Attenzione: la tabella `activity` e creata da **cinque** migrazioni distinte
(`2023_03_31_103350`, `2023_03_31_103351`, `2024_01_01_000001`, `2024_01_01_000002`,
`2026_02_13_171410` e `2026_06_10_141000`), piu `stored_events`, `snapshots`,
`test_models`. Esiste una directory `_bak/`. Questa sovrapposizione e un punto
noto (vedi [brainstorming](./brainstorming.md)).

## Test (`tests/`, 145 file PHP)

E il modulo piu testato del monorepo in rapporto alle sue dimensioni.

## Da leggere

- [module-boundary.md](./architecture/module-boundary.md) — confini del modulo.
- [module-map.md](./architecture/module-map.md) — mappa file -> responsabilita, una riga per file.
- [brainstorming.md](./brainstorming.md) — decisioni prese e problemi aperti.
=======
=======
>>>>>>> .merge_file_QgaouB
# Architettura del modulo Activity

## Overview

[DA COMPLETARE]

## Componenti principali

### Actions
Azioni eseguibili (Queueable Actions) per la logica di business.

### Resources
Risorse Filament per il pannello di amministrazione.

### Widget
Widget Filament per dashboard e pannelli.

### Models
Modelli Eloquent per l'interazione con il database.

### Contracts
Interfacce per l'iniezione di dipendenze.

## Flussi di dati

[DA COMPLETARE]

## Pattern utilizzati

- Action invece di Service
- Filament Widget invece di Livewire
- Array una chiave per riga
- Schema-driven Forms (XotBaseSchemaWidget)
<<<<<<< .merge_file_tTLpcO
>>>>>>> .merge_file_NiN8ob
=======
>>>>>>> .merge_file_QgaouB
