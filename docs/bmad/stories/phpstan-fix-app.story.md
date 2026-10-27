---
id: Activity/2026-10-21-phpstan-fix-app
title: "Activity — PHPStan Level max fix su codice app"
status: ready-for-dev
module: Activity
epic: phpstan-campaign
priority: P1
created: 2026-10-21
type: story
updated: 2026-10-21
tags: [phpstan, activity, fix, stories]
qmd: "phpstan activity module fix app source code level max"
---

# Story — Activity: PHPStan Level max sul codice `app/`

## Scopo e confini

Questa story affronta i soli errori PHPStan Level `max` che riguardano il codice di produzione (`app/`) del modulo Activity. Gli errori nei test (`tests/`) riguardano in larga parte classi interne di Pest (`method.internalClass`) e richiedono un intervento sistemico su più moduli, non un fix puntuale in questo modulo.

Il modulo Activity possiede l'integrazione dei pacchetti Spatie (`spatie/laravel-activitylog`, `spatie/laravel-event-sourcing`), la connessione `activity` e le tre tabelle di audit (`activity_log`, `stored_events`, `snapshots`). Dipende da `Modules\Xot`, non conosce alcun modulo di dominio.

## Errore rilevati al primo run

Errore `| file | line | message | identifier |`

| File | Linea | Messaggio | ID |
|------|-------|-----------|----|
| `Modules/Activity/app/Actions/ActivityLogger.php` | 149 | `getUserActivities()` should return `Illuminate\Database\Eloquent\Collection<int, Modules\Activity\Models\Activity>` but returns `Illuminate\Support\Collection<int, ...>|Illuminate\Support\Collection<int, stdClass>` | `return.type` |
| `Modules/Activity/app/Actions/ActivityLogger.php` | 165 | Same (getModelActivities) | `return.type` |
| `Modules/Activity/app/Actions/ActivityLogger.php` | 188 | Same (getByType) | `return.type` |
| `Modules/Activity/app/Actions/ActivityLogger.php` | 207 | Same (getRecent) | `return.type` |
| `Modules/Activity/app/Actions/ActivityMaintenanceAction.php` | 33 | `Call to an undefined method ... Builder|Activity::chunkById()` | `method.notFound` |
| `Modules/Activity/app/Actions/ActivityMaintenanceAction.php` | 35 | `Parameter #2 $values ... expects array<int, mixed>, Collection given` | `argument.type` |
| `Modules/Activity/app/Actions/Log/BuildLogViewerStateAction.php` | 70 | `Cannot cast array|string to string` | `cast.string` |
| `Modules/Activity/app/Actions/Log/BuildLogViewerStateAction.php` | 83 | `Parameter $error ... expects string|null, mixed given` | `argument.type` |
| `Modules/Activity/app/Actions/Query/GetActivitiesByTypeAction.php` | 31 | `execute() should return Eloquent Collection ... but returns Support Collection|stdClass` | `return.type` |
| `Modules/Activity/app/Actions/Query/GetModelActivitiesAction.php` | 24 | Same | `return.type` |
| `Modules/Activity/app/Actions/Query/GetRecentActivitiesAction.php` | 28 | Same | `return.type` |
| `Modules/Activity/app/Actions/Query/GetUserActivitiesAction.php` | 29 | Same | `return.type` |
| `Modules/Activity/app/Filament/Pages/ListLogActivities.php` | 266-270 | `Call to undefined method Component::getName/getLabel`, cast string, array key mixed | `method.notFound`/`cast.string`/`array.invalidKey` |
| `Modules/Activity/app/Filament/Pages/LogViewer.php` | 121-126 | `Cannot cast array|string to string`, label expects string/null but mixed | `cast.string`/`argument.type` |
| `Modules/Activity/app/Filament/Resources/ActivityResource/Pages/ListActivities.php` | 13 | `extends unknown class Modules\Xot\Filament\Resources\Pages\XotBaseListRecords` | `class.notFound` |
| `Modules/Activity/app/Filament/Resources/SnapshotResource/Pages/ListSnapshots.php` | 13 | Same | `class.notFound` |
| `Modules/Activity/app/Filament/Resources/StoredEventResource/Pages/ListStoredEvents.php` | 10 | Same | `class.notFound` |
| `Modules/Activity/app/Models/Activity.php` | 109 | `@mixin \Eloquent` unknown class | `class.notFound` |
| `Modules/Activity/app/Models/Activity.php` | 165 | `scopeHasBatch()` should return `Eloquent Builder<static>` but returns `Query Builder` | `return.type` |
| `Modules/Activity/app/Models/Snapshot.php` | 42 | `@mixin \Eloquent` unknown class | `class.notFound` |
| `Modules/Activity/app/Models/StoredEvent.php` | 65 | `@mixin \Eloquent` unknown class | `class.notFound` |
| `Modules/Activity/app/Models/TestModel.php` | 30 | `@mixin \Eloquent` unknown class | `class.notFound` |

I test contribuiscono con 712 errori aggiuntivi, prevalentemente `method.internalClass` (classi interne di Pest), `staticMethod.notFound` (`Snapshot::create`, `StoredEvent::create`), `property.notFound`.

## Fix applicati al codice sorgente

1. **XotBaseListRecords** (`Modules/Xot/app/Filament/Resources/Pages/XotBaseListRecords.php`): risolto il marker di merge `<<<<<<<` / `=======` / `>>>>>>>` che rendeva sconosciuta la classe base per `ListActivities`, `ListSnapshots`, `ListStoredEvents` (3 errori `class.notFound` rimossi).
2. I restanti errori in `app/` richiedono correzioni puntuali per file:
   - `@mixin \Eloquent` in `Activity.php`, `Snapshot.php`, `StoredEvent.php`, `TestModel.php`: rimuovere il tag `@mixin \Eloquent` (alias non risolto da PHPStan).
   - `scopeHasBatch()` / `scopeForBatch()` (`Activity.php`): cast del risultato di `whereNotNull()`/`where()` a `Builder<static>`.
   - `ActivityLogger.php` / `Query\*.php`: cast della collezione restituita a `Collection<int, Activity>` via `collect(...)` e generics espliciti.
   - `ActivityMaintenanceAction.php`: `chunkById()` non esiste su Builder; usare `chunk()` o iterazione con `cursor()`.
   - `BuildLogViewerStateAction.php`: type-narrow per `$error` prima di passarlo a `LogViewerStateData`.
   - `ListLogActivities.php`, `LogViewer.php`: type-narrow sui componenti prima di chiamare `getName()`/`getLabel()` e cast string sicuro.

## Verifica

```
php -d memory_limit=-1 ./vendor/bin/phpstan analyse Modules/Activity --level=max -c phpstan.neon --no-progress --error-format=raw
```

Criterio di accettazione: `0 errori` nel codice `app/`. Gli errori nei `tests/` sono tracciati a sé stanti e richiedono un intervento sistemico (stub Pest PHPStan o esclusione configurata), non un fix in questo modulo.