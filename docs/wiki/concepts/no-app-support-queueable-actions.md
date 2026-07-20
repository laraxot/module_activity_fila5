---
title: "no app/Support — Activity QueueableAction"
type: concept
tags: [activity, actions, queueable-action, support, adapters]
created: 2026-07-12
updated: 2026-07-20
qmd: "Activity module no Support RedactModelAttributes IsActivityLogSchemaWritable ActivityLogger adapter duplicate legacy"
issues:
  - "https://github.com/laraxot/base_fixcity_fila5/issues/372"
discussions:
  - "https://github.com/laraxot/base_fixcity_fila5/discussions/273"
related:
  - ../../../../docs/wiki/concepts/no-app-support-monorepo-migration.md
  - ./queueable-action-execute-entrypoint.md
  - ./queueable-action-trait-mandatory.md
---

# Activity — `app/Support/` eliminato

| Legacy | Destinazione |
|--------|--------------|
| `RedactModelAttributes` | `RedactModelAttributesAction` (`app/Actions/RedactModelAttributesAction.php`) |
| `ActivityLogSchema` | `IsActivityLogSchemaWritableAction` (`app/Actions/Schema/IsActivityLogSchemaWritableAction.php`) |
| `ActivityLogger` (coordinator) | `Adapters/ActivityLogger` — delega alle Action esistenti |
| `ActivityRecorder` (coordinator) | `Adapters/ActivityRecorder` — implementa `ActivityRecorderContract`, delega a `RecordSubjectActivityAction` / `GetSubjectActivityLogAction` |

Zen: il coordinator multi-metodo non è una Action; vive in `Adapters/` e chiama solo `execute()` sulle Action.

## ⚠️ Gotcha attuale: doppione `ActivityLogger` non ancora rimosso

A oggi (2026-07-20) esistono **due classi `ActivityLogger`** nel modulo:

- `Modules\Activity\Actions\ActivityLogger` (`app/Actions/ActivityLogger.php`) — **legacy**, viola la convention: usa `QueueableAction` ma espone più metodi pubblici (`log`, `created`, `updated`, `deleted`, `login`, `logout`, `custom`, `getUserActivities`, `getModelActivities`, `getByType`, ...) invece del solo `execute()`. È ancora coperta da `tests/Feature/ActionsTest.php` e `tests/Unit/Actions/ActivityLoggerTest.php`, quindi non va rimossa senza prima migrare quei test.
- `Modules\Activity\Adapters\ActivityLogger` (`app/Adapters/ActivityLogger.php`) — coordinator corrente, stessa API pubblica ma implementata delegando a Query Actions dedicate (`GetUserActivitiesAction`, `GetModelActivitiesAction`, `GetActivitiesByTypeAction`, ...) invece di query inline.

Nessun binding esplicito nel `ActivityServiceProvider` sceglie l'uno o l'altro: sono due classi indipendenti, non un alias. Chi scrive nuovo codice deve usare `Modules\Activity\Adapters\ActivityLogger`; la classe in `Actions/` è mantenuta solo per compatibilità dei test esistenti e non va referenziata da codice nuovo. Rimuoverla è un lavoro di codice (fuori scope per una sessione documentazione-only) — tracciato qui perché è l'unica fonte di verità sul perché esistono due implementazioni quasi identiche.
